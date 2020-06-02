<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\UserManagement;

class ModerationController extends Controller
{
    public function __construct(){
        $this->questionController = new QuestionController();
        $this->userController = new UserController();
        $this->answerController = new AnswerController();
        $this->commentController = new CommentController();
    }

    public function show(){
        if (!Auth::check() || (Auth::user()->getUserCurrentRole() != "administrator" && Auth::user()->getUserCurrentRole() != "moderator"))
            return redirect('/');

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

        // get reported users

        $user_info = $this->userController->listReported();
        $userReports = $user_info['userReports'];
        $reportedUsers = $user_info['reportedUsers'];
        $user_reporters = [];

        foreach($reportedUsers as $user){
            foreach($userReports[$user->id] as $report){
                $user_reporters[$report->id] = $this->userController->getUsername($report->reporter_id);
            }
        }

        // get best users

        $best_users = $this->userController->listBestScoreUsers();
        $best_moderators = $this->userController->listBestScoreModerators();

        return view('pages.moderate', ['questionsReports' => $questionsReports, 'reportedQuestions' => $reportedQuestions, 'owners' => $owners, 'reporters' => $reporters, 'answerReports' => $answerReports, 'reportedAnswers' => $reportedAnswers, 'answer_owners' => $answer_owners, 'answer_reporters' => $answer_reporters, 'commentReports' => $commentReports, 'reportedComments' => $reportedComments, 'comment_owners' => $comment_owners, 'comment_reporters' => $comment_reporters, 'userReports' => $userReports, 'reportedUsers' => $reportedUsers, 'user_reporters' => $user_reporters, 'best_users' => $best_users, 'best_moderators' => $best_moderators]);

    }

    public function promote($id) {
        
        //Get user with id
        $user = User::find($id);
        //Get its current role
        $currentRole = $user->getUserCurrentRole();

        //Create new user_management
        $user_management = UserManagement::where('user_id', $id)->first();

        $this->authorize('promote', [$user_management, $user]);
        
        //Promote user
        if ($currentRole == 'user') {
            $user_management->status = 'moderator';
            $user_management->save();
            $content = 'You have been promoted to Moderator!';
        }
        else if ($currentRole == 'moderator') {
            $user_management->status = 'administrator';
            $user_management->save();
            $content = 'You have been promoted to Administrator!';
        }

        // notifies user's promotion
        DB::table('notification')->insert([
            ['content' => $content, 'user_id' => $id]
        ]);
    }

    public function demote($id) {
        
        //Get user with id
        $user = User::find($id);
        //Get its current role
        $currentRole = $user->getUserCurrentRole();

        //Create new user_management
        $user_management = UserManagement::where('user_id', $id)->first();

        $this->authorize('demote', [$user_management, $user]);
        
        //Demote user
        if ($currentRole == 'moderator') {
            $user_management->status = 'user';
            $user_management->save();
            $content = 'You have been demoted to an average User.';
        }
        else if ($currentRole == 'administrator') {
            $user_management->status = 'moderator';
            $user_management->save();
            $content = 'You have been demoted to Moderator.';
        }

        // notifies user's promotion
        DB::table('notification')->insert([
            ['content' => $content, 'user_id' => $id]
        ]);
    }

    public function ban($id) {
        
        //Get user with id
        $user = User::find($id);

        //Create new user_management
        $user_management = UserManagement::where('user_id', $id)->first();

        $this->authorize('ban', [$user_management, $user]);
        
        //Demote user
        $user_management->status = 'banned';
        $user_management->save();
    }

    public function delete($id) {
        
        //Get user with id
        $user = User::find($id);
  
        //Create new user_management
        $user_management = UserManagement::where('user_id', $id)->first();
  
        $this->authorize('delete', [$user_management, $user]);
        
        //Demote user
        $user_management->status = 'deleted';
        $user_management->save();
    }

}
