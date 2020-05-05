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
     */
    public function create(Request $request)
    {
        $question_following = new QuestionFollowing();

        $user_id = Auth::user()->id;
        $question_id = $request->input('id');

        DB::insert('insert into question_following (user_id, question_id) values (?, ?)', [$user_id, $question_id]);

        $question_title = $this->questionController->getQuestion($question_id)->title;

        return $question_title;

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

    public function follow(Request $request){

        

    }

}
