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
    }

    public function show($content) {
        $KeyWord = '';
        $start_date = '';
        $end_date = '';

        $array = preg_split("/%strDate/", $content);
        if (count($array) == 1) {
            $array = preg_split("/%endDate/", $array[0]);
            $KeyWord = $array[0];
            if (count($array) == 2) {
                $end_date = $array[1];
            }
        }
        else if (count($array) == 2) {
            $KeyWord = $array[0];
            $array = preg_split("/%endDate/", $array[1]);
            $start_date = $array[0];
            if (count($array) == 2) {
                $end_date = $array[1];
            }
        }

        $questions = $this->questionController->listSearch($KeyWord, $start_date, $end_date);

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
        return $content;
    }
}
