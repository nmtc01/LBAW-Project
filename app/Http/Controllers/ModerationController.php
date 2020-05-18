<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ModerationController extends Controller
{
    public function __construct(){
        $this->questionController = new QuestionController();
        $this->userController = new UserController();
        $this->answerController = new AnswerController();
    }

    public function show(){
        $info = $this->questionController->listReported();
        $questionsReports = $info['questionsReports'];
        $reportedQuestions = $info['reportedQuestions'];
        $owners = [];
        $reporters = [];

        foreach($reportedQuestions as $question){
            $owners[$question->id] = $this->userController->getUsername($question->user_id);

            foreach($questionsReports[$question->id] as $report){
                $reporters[$report->id] = $this->userController->getUsername($report->reporter_id);
            }
        }

        return view('pages.moderate', ['questionsReports' => $questionsReports, 'reportedQuestions' => $reportedQuestions, 'owners' => $owners, 'reporters' => $reporters]);

    }

}
