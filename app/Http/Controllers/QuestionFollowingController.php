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

        $question = $this->questionController->getQuestion($question_id);
        $questions_number = DB::table('question_following')->where('user_id', $user_id)->count();

        $info = [$question->title, $question_id, $questions_number];

        return $info;

    }

    public function delete(Request $request)
    {

        $question_following = new QuestionFollowing();

        $user_id = Auth::user()->id;
        $question_id = $request->input('id');

        //DB::delete(DB::raw("delete * from question_following where (user_id = $user_id and question_id = $question_id"));
        DB::table('question_following')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();

        $question = $this->questionController->getQuestion($question_id);

        $info = [$question->title, $question_id];

        return $info;

    
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
