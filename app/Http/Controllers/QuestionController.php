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

      $date = date('Y-m-d');

      $question->save();
      
      $info = [$question->title, $question->description, $username, $date, $question->id];

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

      return $questions;

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
      $userComments = [];
      $userAnswers = [];
      $subComments = [];
      $userSubComments = [];

      foreach ($comments as $comment){
        $userComments[$comment->id]=$this->userController->getUsername($comment->user_id);
      }

      foreach ($answers as $answer){
        $userAnswers[$answer->id]=$this->userController->getUsername($answer->user_id);
        $sub = $this->commentController->listAnswerComments($answer->id);

        $subComments[$answer->id] = $sub;

        foreach ($subComments[$answer->id] as $subComment){
          $userSubComments[$subComment->id]=$this->userController->getUsername($subComment->user_id);
        }
      }

      return view('pages.question_page', ['question' => $question, 'user' => $user, 'comments' => $comments, 'answers' => $answers, 'userComments' => $userComments, 'userAnswers' => $userAnswers, 'subComments' => $subComments, 'userSubComments' => $userSubComments]);
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

      $question->user_id = Auth::user()->id;
      $question->title = $request->input('title');
      $question->description = $request->input('description');
      $username = Auth::user()->username;

      $date = date('Y-m-d');
      
      $info = [$question->title, $question->description, $username, $date, $id];

      return $info;

    }

    public function update(Request $request, $id) 
    {
      $question = Question::find($id);

      $this->authorize('edit', $question);

      $question->user_id = Auth::user()->id;
      $question->title = $request->input('title');
      $question->description = $request->input('description');
      $username = Auth::user()->username;

      $date = date('Y-m-d');

      $question->save();
      
      $info = [$question->title, $question->description, $username, $date, $id];

      return $info;

    }

    public function startLabel(Request $request) 
    {
      $label = new Label();

      $this->authorize('start', $label);
    }
}