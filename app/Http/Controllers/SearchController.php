<?php

namespace App\Http\Controllers;

use App\QuestionFollowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{

    private $questionController;
    private $searchKeyWord;

    public function __construct(){
        $this->questionController = new QuestionController();
        $this->userController = new UserController();
        $this->answerController = new AnswerController();
        $this->questionFollowingController = new QuestionFollowingController();
        //$this->searchKeyWord=' eidoid ';
    }

    public function show($KeyWord) {

        $questions = $this->questionController->listSearch($KeyWord);

        $questions_followed=[];
        if(Auth::check()){
            $questions_followed = $this->questionFollowingController->listFollowedQuestions();
        }
        
        
        $users = [];
        $nr_answers = [];

        foreach($questions as $question){
            $users[$question->id] = $this->userController->getUsername($question->user_id);
            $nr_answers[$question->id] = $this->answerController->getNrAnswers($question->id);
        }
        
        return view('pages.search',['questions' => $questions, 'users' => $users, 'nr_answers' => $nr_answers, 'questions_followed' => $questions_followed, 'KeyWord' => $KeyWord]);
    }

    public function startSearch(Request $request)
    {
        $content = $request->input('content');
        $arr = array('KeyWord' => $content);
        return json_encode($arr);
    }
}
