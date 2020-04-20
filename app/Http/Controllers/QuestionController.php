<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\Question;

class QuestionController extends Controller
{
    /**
     * Shows the Question for a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      $question = Question::find($id);

      //$this->authorize('show', $question);

      //return view('pages.question', ['question' => $question]);
      return $question;
    }

    /**
     * Shows all questions.
     *
     * @return Response
     */
    public function list()
    {

      //$this->authorize('list', Question::class);

      $questions = Question::all();

      //return view('pages.home', ['questions' => $questions]);
      return $questions;

    }


}
