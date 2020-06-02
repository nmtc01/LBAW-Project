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
      /*$questions = $this->questionController->list();

      $questions_followed=[];
      if(Auth::check()){
          $questions_followed = $this->questionFollowingController->listFollowedQuestions();
      }
      
      
      $users = [];
      $nr_answers = [];
      $questionsVotes = [];

      foreach($questions as $question){
          $users[$question->id] = $this->userController->getUsername($question->user_id);
          $nr_answers[$question->id] = $this->answerController->getNrAnswers($question->id);
          if(Auth::check()){
              $questionsVotes[$question->id] = DB::table('vote')->where([['user_id', Auth::user()->id], ['question_id', $question->id],])->first();
          }else $questionsVotes[$question->id] = 0;
      }*/

      //$userInfo = DB::select(DB::raw("select * from 'user' where id = $id"));
      $userInfo = DB::table('user')->where('id', $id)->first();

      return view('pages.profile', ['userInfo' => $userInfo]);
    }

    public function editProfile(Request $request, $id){
      $user = User::find($id);

      $user->first_name = $request->input('first_name');
      $user->last_name = $request->input('last_name');
      $user->email = $request->input('email');
      $user->bio = $request->input('description');
      $user->username = $request->input('username');

      $user->save();
      
      $info = [$id];

      error_log($id);
      return $info;
    }
}