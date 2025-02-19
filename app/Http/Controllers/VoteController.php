<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Vote;

class VoteController extends Controller
{
    public function __construct(){
        $this->questionController = new QuestionController();
        $this->answerController = new AnswerController();
    }

    public function addLikeQ(Request $request)
    {
        $vote = new Vote();

        $this->authorize('create', $vote);

        $user_id = Auth::user()->id;
        $question_id = $request->input('id');
        $operation = 0;

        
        $like = DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->first();

        if($like === null){
            $vote->vote = true;
            $vote->user_id = $user_id;
            $vote->question_id = $question_id;
            $vote->save();
            //DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, $question_id, null]);
            $operation = 1;
        }else if($like->vote == true){
            
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();
            $operation = 2;

        }else{
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();
            $vote->vote = true;
            $vote->user_id = $user_id;
            $vote->question_id = $question_id;
            $vote->save();
            //DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, $question_id, null]);
            $operation = 3;

        }

        $question = $this->questionController->getQuestion($question_id);
        $info = [$question->nr_likes, $question->nr_dislikes, $question_id, $operation];
        return $info;

    }

    public function addDislikeQ(Request $request)
    {
        $vote = new Vote();

        $this->authorize('create', $vote);

        $user_id = Auth::user()->id;
        $question_id = $request->input('id');
        $operation = 0;

        //check if it was already liked
        $like = DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->first();
        if($like === null){
            $vote->vote = false;
            $vote->user_id = $user_id;
            $vote->question_id = $question_id;
            $vote->save();
            //DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, $question_id, null]);
            $operation = 1;
        }else if($like->vote == false){
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();
            $operation = 2;
        }else{
            DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->delete();
            $vote->vote = false;
            $vote->user_id = $user_id;
            $vote->question_id = $question_id;
            $vote->save();
            //DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, $question_id, null]);
            $operation = 3;

        }

        $question = $this->questionController->getQuestion($question_id);
        $info = [ $question->nr_likes, $question->nr_dislikes, $question_id, $operation];
        return $info;
    }


    
    public function addLikeA(Request $request)
    {
        $vote = new Vote();

        $this->authorize('create', $vote);

        $user_id = Auth::user()->id;
        $answer_id = $request->input('id');
        $operation = 0;

        $like = DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->first();

        if($like === null){
            $vote->vote = true;
            $vote->user_id = $user_id;
            $vote->answer_id = $answer_id;
            $vote->save();
            //DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, null, $answer_id]);
            $operation = 1;
        }else if($like->vote == true){
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();
            $operation = 2;

        }else{
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();
            $vote->vote = true;
            $vote->user_id = $user_id;
            $vote->answer_id = $answer_id;
            $vote->save();
            //DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [true, $user_id, null, $answer_id]);
            $operation = 3;

        }

        $answer = $this->answerController->getAnswer($answer_id);
        $info = [ $answer->nr_likes, $answer->nr_dislikes, $operation, $answer->id];
        return $info;
    }

    public function addDislikeA(Request $request)
    {
        $vote = new Vote();

        $this->authorize('create', $vote);

        $user_id = Auth::user()->id;
        $answer_id = $request->input('id'); //???
        $operation = 0;

        //check if it was already liked
        $like = DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->first();
        if($like === null){
            $vote->vote = false;
            $vote->user_id = $user_id;
            $vote->answer_id = $answer_id;
            $vote->save();
            //DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, null, $answer_id]);
            $operation = 1;
        }else if($like->vote == false){
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();
            $operation = 2;
        }else{
            DB::table('vote')->where([['user_id', $user_id], ['answer_id', $answer_id],])->delete();
            $vote->vote = false;
            $vote->user_id = $user_id;
            $vote->answer_id = $answer_id;
            $vote->save();
            //DB::insert('insert into vote (vote, user_id, question_id, answer_id) values (?, ?, ?, ?)', [false, $user_id, null, $answer_id]);
            $operation = 3;

        }
    

        $answer = $this->answerController->getAnswer($answer_id);
        $info = [$answer->nr_likes, $answer->nr_dislikes, $operation, $answer->id];
        return $info;

    }

    public function getQVote($user_id, $question_id){
        $vote = DB::table('vote')->where([['user_id', $user_id], ['question_id', $question_id],])->first();
        return $vote->vote;
    }
}