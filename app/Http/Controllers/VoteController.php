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

        $user_id = Auth::user()->id;
        $question_id = $request->input('id');

        //check if it was already liked
        $like = DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->first();
        $nrLikes = (DB::table('question')->where([['id', $question_id],])->first())->nr_likes;

        if($like === null){
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, $question_id, null]);
        }else if($like->vote == true){
            
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();

        }else{
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, $question_id, null]);
            

        }
    }

    public function addDisikeQ(Request $request)
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
    }


    /*
    public function addLikeA(Request $request)
    {

        $user_id = Auth::user()->id;
        $answer_id = $request->input('id');

        $like = DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->first();

        if($like === null){
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, null, $answer_id]);
        }else if($like->vote == true){
            
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();

        }else{
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $quesanswer_idtion_id],])->delete();
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, null, $answer_id]);
            

        }
    }

    public function addDisikeA(Request $request)
    {

        $user_id = Auth::user()->id;
        $answer_id = $request->input('id'); //???

        //check if it was already liked
        $like = DB::table('vote')->where([['user_id', $user_id], ['answer_id', $question_id],])->first();
        if($like === null){
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, null, $answer_id]);
        }else if($like->vote == false){
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();
        }else{
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();
            DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, null, $answer_id]);

        }
    }*/


}