<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $questionController;

    public function __construct(){
        $this->questionController = new QuestionController();
        $this->userController = new UserController();
    }


    public function show() {

        $questions = $this->questionController->list();
        
        $users = [];

        foreach($questions as $question){
            $users[$question->id] = $this->userController->getUsername($question->user_id);
        }

        return view('pages.home',['questions' => $questions, 'users' => $users]);
    }

    public function home() {
        return redirect('home');
    }

}
