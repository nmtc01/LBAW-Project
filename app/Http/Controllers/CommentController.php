<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
