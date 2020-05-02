<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Comment;

class CommentController extends Controller
{
    /**
     * Shows the Question's comments from a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function listQuestionComments($id)
    {
        $comments = DB::select(DB::raw("select * from comment where question_id = $id"));

        return $comments;
    }

    /**
     * Shows the Answers's comments from a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function listAnswerComments($id)
    {
        $comments = DB::select(DB::raw("select * from comment where answer_id = $id"));

        return $comments;
    }

    public function create(Request $request) {

        $comment = new Comment();

        $this->authorize('create', $comment);

        $comment->content = $request->input('content');
        $comment->user_id = Auth::user()->id;

        if ($request->input('question_index') != null)
          $comment->question_id = $request->input('question_index');
        else if ($request->input('answer_index') != null)
          $comment->answer_id = $request->input('answer_index');
        
        $comment->save();

        $username = Auth::user()->username;
        $user_score = Auth::user()->score;

        $info = [$comment->content, $username, $user_score, $comment->id];

        return $info;

    }

    public function delete(Request $request, $id)
    {
      $comment = Comment::find($id);

      $this->authorize('delete', $comment);
      $comment->delete();

      return $comment;
    }

    public function edit(Request $request, $id) 
    {
      $comment = Comment::find($id);

      $this->authorize('edit', $comment);

      $comment->user_id = Auth::user()->id;
      $comment->content = $request->input('content');
      $username = Auth::user()->username;
      $date = date('Y-m-d');
      
      $info = [$comment->content, $username, $date, $id];

      return $info;

    }

    public function update(Request $request, $id) 
    {
      $comment = Comment::find($id);

      $this->authorize('edit', $comment);

      $comment->user_id = Auth::user()->id;
      $comment->content = $request->input('content');
      $username = Auth::user()->username;

      $date = date('Y-m-d');

      $comment->save();
      
      $info = [$comment->content, $username, $date, $id];

      return $info;

    }
}
