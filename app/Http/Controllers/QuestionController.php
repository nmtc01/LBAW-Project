<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Question;
use App\Label;

class QuestionController extends Controller
{

    public function __construct(){
      $this->userController = new UserController();
      $this->commentController = new CommentController();
      $this->answerController = new AnswerController();
      $this->labelController = new LabelController();
      $this->questionLabelController = new QuestionLabelController();
    }

    /**
     * Creates a new question.
     *
     * @return Question The question created.
     */
    public function create(Request $request)
    {
      $question = new Question();

      $this->authorize('create', $question);

      $question->user_id = Auth::user()->id;
      $question->title = $request->input('title');
      $question->description = $request->input('description');
      $username = Auth::user()->username;

      //$date = date('Y-m-d');

      $question->save();
      
      //$info = [$question->title, $question->description, $username, $date, $question->id];
      $info = [$question->id, $question->title, $question->description];

      return $info;
    }

    /**
     * Shows the Question for a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      $question = Question::find($id);

      //$this->authorize('show', $question);

      return $question;
    }

    /**
     * Shows all questions.
     *
     * @return Response
     */
    public function list()
    {
      $questions = DB::select(DB::raw("select * from question order by question_date desc, (nr_likes - nr_dislikes) desc"));

      $questions = DB::table('question')
                      ->orderByRaw('question_date DESC')
                      ->orderByRaw('(nr_likes - nr_dislikes) DESC')
                      ->paginate(15);

      return $questions;

    }

    public function listPopular()
    {
      $questions = DB::select(DB::raw("select * from question order by (nr_likes - nr_dislikes) desc"));

      return $questions;

    }

    /**
     * Shows all questions.
     *
     * @return Response
     */
    public function listSearch($KeyWord, $start_date, $end_date)
    {
      $keyWord = $KeyWord;
      $questions = '';
      $question_labels = '';
      if ($start_date == '' && $end_date == '') {
        $questions = DB::select(DB::raw("SELECT * from question 
                                        where LOWER(title) like LOWER('%$keyWord%') or LOWER(description) like LOWER('%$keyWord%') 
                                        order by question_date desc, (nr_likes - nr_dislikes) desc"));

        $question_labels = DB::select(DB::raw("SELECT question.* FROM question JOIN question_label on question.id = question_label.question_id JOIN label l on l.id = question_label.label_id WHERE l.name = '$keyWord'"));
      }
      else if ($start_date != '' && $end_date == '') {
        $questions = DB::select(DB::raw("SELECT * from question 
                                        where ((LOWER(title) like LOWER('%$keyWord%') or LOWER(description) like LOWER('%$keyWord%'))
                                        and (question_date >= '$start_date')) 
                                        order by question_date desc, (nr_likes - nr_dislikes) desc"));

        $question_labels = DB::select(DB::raw("SELECT question.* FROM question JOIN question_label on question.id = question_label.question_id JOIN label l on l.id = question_label.label_id WHERE (l.name = '$keyWord') and (question_date >= '$start_date')"));
      }
      else if ($start_date == '' && $end_date != '') {
        $questions = DB::select(DB::raw("SELECT * from question 
                                        where ((LOWER(title) like LOWER('%$keyWord%') or LOWER(description) like LOWER('%$keyWord%'))
                                        and (question_date <= '$end_date')) 
                                        order by question_date desc, (nr_likes - nr_dislikes) desc"));

        $question_labels = DB::select(DB::raw("SELECT question.* FROM question JOIN question_label on question.id = question_label.question_id JOIN label l on l.id = question_label.label_id WHERE (l.name = '$keyWord') and (question_date <= '$end_date')"));
      }
      else if ($start_date != '' && $end_date != '') {
        $questions = DB::select(DB::raw("SELECT * from question 
                                        where ((LOWER(title) like LOWER('%$keyWord%') or LOWER(description) like LOWER('%$keyWord%'))
                                        and (question_date >= '$start_date' and question_date <= '$end_date')) 
                                        order by question_date desc, (nr_likes - nr_dislikes) desc"));

        $question_labels = DB::select(DB::raw("SELECT question.* FROM question JOIN question_label on question.id = question_label.question_id JOIN label l on l.id = question_label.label_id WHERE (l.name = '$keyWord') and (question_date >= '$start_date') and (question_date <= '$end_date')"));
      }

      $result = array_merge($questions, $question_labels);
      return $result;

    }

    /**
     * Shows all questions for a given user.
     *
     * @return Response
     */
    public function getQuestion($question_id)
    {

      $question = Question::find($question_id);
      
      return $question;

    }



    /**
     * Opens the Question Page for a given Question id.
     *
     * @param  int  $id
     * @return Response
     */
    public function open($id)
    {

      $question = Question::find($id);

      $user = $this->userController->getUsername($question->user_id);
      $comments = $this->commentController->listQuestionComments($question->id);
      $answers = $this->answerController->list($question->id);
      $labels = $this->labelController->list($question->id);

      $userComments = [];
      $userAnswers = [];
      $subComments = [];
      $userSubComments = [];
      $vote = null;
      $answersVotes = [];

      $questionFollowingController = new QuestionFollowingController();

      
      $questions_followed=[];
      if(Auth::check()){
          $questions_followed = $questionFollowingController->listFollowedQuestions();
          $vote = DB::table('vote')->where([['user_id', Auth::user()->id], ['question_id', $id],])->first();
      }
      

      foreach ($comments as $comment){
        $userComments[$comment->id]=$this->userController->getUsername($comment->user_id);
      }

      foreach ($answers as $answer){
        $userAnswers[$answer->id]=$this->userController->getUsername($answer->user_id);
        $sub = $this->commentController->listAnswerComments($answer->id);
        if(Auth::check()) $answersVotes[$answer->id] = DB::table('vote')->where([['user_id', Auth::user()->id], ['answer_id', $answer->id],])->first();
        

        $subComments[$answer->id] = $sub;

        foreach ($subComments[$answer->id] as $subComment){
          $userSubComments[$subComment->id]=$this->userController->getUsername($subComment->user_id);
        }
      }

      // for sidenavs
      $popular_questions = $this->listPopular();

      $p_l = $this->questionLabelController->getPopularLabels();
      $popular_labels = [];
      $i = 0;
      foreach($p_l as $l){
          $popular_labels[$i] = $this->labelController->getLabel($l);
          $i++;
      }

    return view('pages.question_page', ['question' => $question, 'user' => $user, 'comments' => $comments, 'answers' => $answers, 'userComments' => $userComments, 'userAnswers' => $userAnswers, 'subComments' => $subComments, 'userSubComments' => $userSubComments, 'questions_followed' => $questions_followed, 'labels' => $labels, 'vote' => $vote ,'answersVotes' => $answersVotes, 'popular_questions' => $popular_questions, 'popular_labels' => $popular_labels]);
    }

    public function delete(Request $request, $id)
    {
      $question = Question::find($id);

      $this->authorize('delete', $question);
      $question->delete();

      return $question;
    }

    public function edit(Request $request, $id) 
    {
      $question = Question::find($id);

      $this->authorize('edit', $question);

      $question->title = $request->input('title');
      $question->description = $request->input('description');
      
      $info = [$question->title, $question->description];

      return $info;

    }

    public function update(Request $request, $id) 
    {
      $question = Question::find($id);

      $this->authorize('edit', $question);

      $question->title = $request->input('title');
      $question->description = $request->input('description');
      $question->save();
      
      $info = [$question->title, $question->description, $question->id];

      return $info;

    }

    public function startLabel(Request $request) 
    {
      $label = new Label();

      $this->authorize('start', $label);
    }

    /**
     * Shows all reported questions.
     *
     * @return Response
     */
    public function listReported()
    {
      $questionsReports = [];
      
      $reportedQuestions = DB::table('question')
                          ->join('report', 'question.id', '=', 'report.question_id')
                          ->join('report_status', 'report.id', '=', 'report_status.report_id')
                          ->select('question.*')
                          ->where('report_status.state', '<>', 'resolved')
                          ->groupby('question.id')
                          ->get();

      foreach($reportedQuestions as $reportedQuestion) {
        $questionsReports[$reportedQuestion->id] = DB::table('report')
                                                  ->select('report.*')
                                                  ->where('report.question_id', $reportedQuestion->id)
                                                  ->get();
      }

      $info = ['questionsReports' => $questionsReports, 'reportedQuestions' => $reportedQuestions];

      return $info;
    }
}