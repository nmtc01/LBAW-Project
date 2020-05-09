<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Vote;

class VoteController extends Controller
{
    public function __construct(){
        $this->userController = new UserController();
        $this->questionController = new QuestionController();
        $this->answerController = new AnswerController();
    }

    public function addLikeQ(Request $request)
    {


        $vote = new Vote();
        $user_id = Auth::user()->id;
        $question_id = $request->input('id');

        
        $like = DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->first();

        if($like === null){
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, $question_id, null]);
        }else if($like->vote == true){
            
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();

        }else{
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, $question_id, null]);

        }

        $question = $this->questionController->getQuestion($question_id);
        $info = [$question->nr_likes, $question->nr_dislikes];
        return $info;

    }

    public function addDislikeQ(Request $request)
    {

        $user_id = Auth::user()->id;
        $question_id = $request->input('id');

        //check if it was already liked
        $like = DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->first();
        if($like === null){
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, $question_id, null]);
        }else if($like->vote == false){
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();
        }else{
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, $question_id, null]);

        }

        $question = $this->questionController->getQuestion($question_id);
        $info = [ $question->nr_likes, $question->nr_dislikes];
        return $info;
    }


    
    public function addLikeA(Request $request)
    {

        $user_id = Auth::user()->id;
        $answer_id = $request->input('id');

        $like = DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->first();

        if($like === null){
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, null, $answer_id]);
        }else if($like->vote == true){
            
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();

        }else{
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, null, $answer_id]);
            

        }

        $answer = $this->answerController->getAnswer($answer_id);
        $info = [ $answer->nr_likes, $answer->nr_dislikes];
        return $info;
    }

    public function addDislikeA(Request $request)
    {

        $user_id = Auth::user()->id;
        $answer_id = $request->input('id'); //???

        //check if it was already liked
        $like = DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->first();
        if($like === null){
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, null, $answer_id]);
        }else if($like->vote == false){
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();
        }else{
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, null, $answer_id]);

        }
    

    $answer = $this->answerController->getAnswer($answer_id);
    $info = [$answer->nr_likes, $answer->nr_dislikes];
    return $info;

    }
}