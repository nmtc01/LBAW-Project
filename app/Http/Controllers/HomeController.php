<?php

namespace App\Http\Controllers;

use App\QuestionFollowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $questionController;

    public function __construct(){
        $this->questionController = new QuestionController();
        $this->userController = new UserController();
        $this->answerController = new AnswerController();
        $this->questionFollowingController = new QuestionFollowingController();
    
    }


    public function show() {

        $questions = $this->questionController->list();

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
        }



        return view('pages.home',['questions' => $questions, 'users' => $users, 'nr_answers' => $nr_answers, 'questions_followed' => $questions_followed, 'questionsVotes' => $questionsVotes]);
    }

    public function home() {
        return redirect('home');
    }

}
