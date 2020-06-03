<?php

namespace App\Http\Controllers;

use App\QuestionFollowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{

    private $questionController;
    private $searchKeyWord;

    public function __construct(){
        $this->questionController = new QuestionController();
        $this->userController = new UserController();
        $this->answerController = new AnswerController();
        $this->questionFollowingController = new QuestionFollowingController();
        $this->questionLabelController = new QuestionLabelController();
        $this->labelController = new LabelController();
    }

    public function show() {
        $KeyWord = '';
        $start_date = '';
        $end_date = '';

        $KeyWord = Input::get('keyword');
        $start_date = Input::get('strDate');
        $end_date = Input::get('endDate');

        $questions = $this->questionController->listSearch($KeyWord, $start_date, $end_date);

        $questions_followed=[];
        if(Auth::check()){
            $questions_followed = $this->questionFollowingController->listFollowedQuestions();
        }
        
        $users = [];

        foreach($questions as $question){
            $users[$question->id] = $this->userController->getUsername($question->user_id);
        }

        // for sidenavs
        $popular_questions = $this->questionController->listPopular();

        $p_l = $this->questionLabelController->getPopularLabels();
        $popular_labels = [];
        $i = 0;
        foreach($p_l as $l){
            $popular_labels[$i] = $this->labelController->getLabel($l);
            $i++;
        }
        
        return view('pages.search',['questions' => $questions, 'users' => $users,  'questions_followed' => $questions_followed, 'KeyWord' => $KeyWord, 'popular_questions' => $popular_questions, 'popular_labels' => $popular_labels]);
    }
        
}
