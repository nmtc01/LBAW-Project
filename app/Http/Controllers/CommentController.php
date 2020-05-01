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
    public function list($id)
    {
        $comments = DB::select(DB::raw("select * from comment where question_id = $id"));

        return $comments;
    }

    public function create(Request $request) {

        $comment = new Comment();

        $this->authorize('create', $comment);

        $comment->content = $request->input('content');
        $comment->user_id = Auth::user()->id;
        $comment->question_id = $request->input('question_index');
        
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
}
