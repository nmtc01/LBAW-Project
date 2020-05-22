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
        $this->commentController = new CommentController();
    }

    public function show(){

        // get reported questions

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

        // get reported answers

        $answers_info = $this->answerController->listReported();
        $answerReports = $answers_info['answerReports'];
        $reportedAnswers = $answers_info['reportedAnswers'];
        $answer_owners = [];
        $answer_reporters = [];

        foreach($reportedAnswers as $answer){
            $answer_owners[$answer->id] = $this->userController->getUsername($answer->user_id);

            foreach($answerReports[$answer->id] as $report){
                $answer_reporters[$report->id] = $this->userController->getUsername($report->reporter_id);
            }
        }

        // get reported comments

        $comment_info = $this->commentController->listReported();
        $commentReports = $comment_info['commentReports'];
        $reportedComments = $comment_info['reportedComments'];
        $comment_owners = [];
        $comment_reporters = [];

        foreach($reportedComments as $comment){
            $comment_owners[$comment->id] = $this->userController->getUsername($comment->user_id);

            foreach($commentReports[$comment->id] as $report){
                $comment_reporters[$report->id] = $this->userController->getUsername($report->reporter_id);
            }
        }


        return view('pages.moderate', ['questionsReports' => $questionsReports, 'reportedQuestions' => $reportedQuestions, 'owners' => $owners, 'reporters' => $reporters, 'answerReports' => $answerReports, 'reportedAnswers' => $reportedAnswers, 'answer_owners' => $answer_owners, 'answer_reporters' => $answer_reporters, 'commentReports' => $commentReports, 'reportedComments' => $reportedComments, 'comment_owners' => $comment_owners, 'comment_reporters' => $comment_reporters]);

    }

}
