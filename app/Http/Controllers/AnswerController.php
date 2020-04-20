<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Shows the Question's answers from a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function list($id)
    {
        $answers = DB::select(DB::raw("select * from answer where question_id = $id"));

        return $answers;
    }
}
