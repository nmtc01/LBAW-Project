<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $questionController;

    public function __construct(){
        $this->questionController = new QuestionController();
        $this->userController = new UserController();
        $this->answerController = new AnswerController();
    }


    public function show() {

        $questions = $this->questionController->list();
        
        $users = [];
        $nr_answers = [];

        foreach($questions as $question){
            $users[$question->id] = $this->userController->getUsername($question->user_id);
            $nr_answers[$question->id] = $this->answerController->getNrAnswers($question->id);
        }



        return view('pages.home',['questions' => $questions, 'users' => $users, 'nr_answers' => $nr_answers]);
    }

    public function home() {
        return redirect('home');
    }

}
