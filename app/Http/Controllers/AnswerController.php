<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Answer;
use App\User;

class AnswerController extends Controller
{
    public function __construct(){
      $this->commentController = new CommentController();
      $this->notificationController = new NotificationController();
    }


    public function getAnswer($answer_id)
    {

      $answer = Answer::find($answer_id);
      
      return $answer;

    }

    /**
     * Shows the Question's answers from a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function list($id)
    {
        $answers = DB::select(DB::raw("select * from answer where question_id = $id"));

        return $answers;
    }

    /**
     * Creates a new answer.
     *
     * @return Answer The answer created.
     */
    public function create(Request $request)
    {
      $answer = new Answer();

      $this->authorize('create', $answer);

      $answer->content = $request->input('content');
      $answer->user_id = Auth::user()->id;
      $answer->question_id = $request->input('question_index');
      $answer->save();

      // notificaties question's user

      $notification_user_id = DB::table('question')
                  ->select('question.*')
                  ->where('question.id', $answer->question_id)
                  ->first();
      error_log($notification_user_id->user_id);
      $content = 'A user has answered a question of yours';
      //$this->notificationController->create($content, $notification_user_id);
      DB::table('notification')->insert([
        ['content' => $content, 'user_id' => $notification_user_id->user_id]
      ]);

      // ----
      
      $username = Auth::user()->username;
      $user_score = Auth::user()->score;

      $info = [$answer->content, $username, $user_score, $answer->id, $answer->user_id];

      return $info;
    }

    public function delete(Request $request, $id)
    {
      $answer = Answer::find($id);

      $this->authorize('delete', $answer);
      $answer->delete();

      return $answer;
    }

    public function edit(Request $request, $id) 
    {
      $answer = Answer::find($id);

      $this->authorize('edit', $answer);

      $answer->content = $request->input('content');
      
      $info = [$answer->content, $id];

      return $info;

    }

    public function update(Request $request, $id) 
    {
      $answer = Answer::find($id);

      $this->authorize('edit', $answer);

      $answer->content = $request->input('content');
      $answer->save();
      
      $info = [$answer->content, $id];

      return $info;

    }

    public function getNrAnswers($question_id){

      $count = Answer::where('question_id', $question_id)->count();

      return $count;

    }

    public function setBestAnswer(Request $request){

      $answer = Answer::find($request->input('id'));

      $username = $request->input('username');

      // $question_user = DB::table('user')->where('username', $username)->first();

      $user = new User();
      $user->username = $username;

      $this->authorize('setBestAnswer', [$answer, $user]);

      if($answer->marked_answer){
        $answer->marked_answer = 0;
        
      }
      else{
        $this->setMarkedAnswersFalse($answer->question_id);
        $answer->marked_answer = 1;
      }
      
      $answer->save();

      $info = [$answer->id, $answer->marked_answer];

      return $info;

    }

    public function setMarkedAnswersFalse($question_id){

      $answers = $this->list($question_id);
      foreach($answers as $answer){
        $new_answer = Answer::find($answer->id);
        $new_answer->marked_answer = 0;
        $new_answer->save();
      }

    }

    public function listReported(){

      $answerReports = [];
      
      $reportedAnswers = DB::table('answer')
                          ->join('report', 'answer.id', '=', 'report.answer_id')
                          ->join('report_status', 'report.id', '=', 'report_status.report_id')
                          ->select('answer.*')
                          ->where('report_status.state', '<>', 'resolved')
                          ->groupby('answer.id')
                          ->get();

      foreach($reportedAnswers as $reportedAnswer) {
        $answerReports[$reportedAnswer->id] = DB::table('report')
                                                  ->where('answer_id', $reportedAnswer->id)
                                                  ->get();
      }

      $info = ['answerReports' => $answerReports, 'reportedAnswers' => $reportedAnswers];

      return $info;
      

    }

    
}
