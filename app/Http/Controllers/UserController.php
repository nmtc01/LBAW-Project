<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\User;
use App\UserManagement;

class UserController extends Controller
{
    

    /**
     * Shows all questions.
     *
     * @return Response
     */
    public function list()
    {

      $users = User::all();

      return $users;

    }

    public function getUsername($id)
    {
      $username = User::where('id', $id)->first();

      return $username;
    }

    public function profile($id) {

      $users = [];
      $nr_answers = [];
      $questionsVotes = [];
      $nr_answers = [];

      $userQuestions = DB::select(DB::raw("SELECT question.*
      from question 
      where question.user_id = $id
      limit 5;"));

      $answerController = new AnswerController();
      
      foreach($userQuestions as $question){
        $nr_answers[$question->id] = $answerController->getNrAnswers($question->id);
        
      }

      $userInfo = User::find($id);

      return view('pages.profile', ['userInfo' => $userInfo, 'userQuestions' => $userQuestions, 'nr_answers' => $nr_answers,]);
    }

    public function listReported(){

      $userReports = [];
      
      $reportedUsers = DB::table('user')
                          ->join('report', 'user.id', '=', 'report.user_id')
                          ->join('report_status', 'report.id', '=', 'report_status.report_id')
                          ->select('user.*')
                          ->where('report_status.state', '<>', 'resolved')
                          ->groupby('user.id')
                          ->get();

      foreach($reportedUsers as $reportedUser) {
        $userReports[$reportedUser->id] = DB::table('report')
                                                  ->where('user_id', $reportedUser->id)
                                                  ->get();
      }

      $info = ['userReports' => $userReports, 'reportedUsers' => $reportedUsers];

      return $info;
      
    }

    public function listBestScoreUsers(){
      $best = DB::table('user')
                  ->join('user_management', 'user.id', '=', 'user_management.user_id')
                  ->select('user.*')
                  ->where('user_management.status', 'user')
                  ->orderByRaw('score DESC')
                  ->limit(10)
                  ->get();

      return $best;
    }

    public function listBestScoreModerators(){
      $best = DB::table('user')
                  ->join('user_management', 'user.id', '=', 'user_management.user_id')
                  ->select('user.*')
                  ->where('user_management.status', 'moderator')
                  ->orderByRaw('score DESC')
                  ->limit(10)
                  ->get();

      return $best;
    }
}