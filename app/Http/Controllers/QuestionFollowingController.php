<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\QuestionFollowing;

class QuestionFollowingController extends Controller
{
    
    public function __construct(){
        $this->userController = new UserController();
        $this->questionController = new QuestionController();
    }

    /**
     * Creates a new question_following.
     *
     * @return Answer The answer created.
     */
    public function create(Request $request)
    {
        /*
      //$this->authorize('create', $answer);

      $answer = new Answer();

      $this->authorize('create', $answer);

      $answer->content = $request->input('content');
      $answer->user_id = Auth::user()->id;
      $answer->question_id = $request->input('question_index');
      $answer->save();
      
      $username = Auth::user()->username;
      $user_score = Auth::user()->score;

      $info = [$answer->content, $username, $user_score, $answer->id];

      return $info;
      */
    }

    public function delete(Request $request, $id)
    {
        /*
      $answer = Answer::find($id);

      $this->authorize('delete', $answer);
      $answer->delete();

      return $answer;
      */
    }

    public function listFollowedQuestions(){

        $user_id = Auth::user()->id;

        $followed_questions = DB::select(DB::raw("select * from question_following where user_id = $user_id"));

        
        $questions = [];
        $i = 0;

        foreach($followed_questions as $followed_question){
            $questions[$i] = $this->questionController->getQuestion($followed_question->question_id);
            $i++;
        }
        

        return $questions;

    }

}
