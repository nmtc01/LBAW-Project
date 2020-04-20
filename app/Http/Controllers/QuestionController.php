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

      //$questions = Question::all()->sortByDesc("nr_likes")->sortByDesc("question_date");
      $questions = DB::select(DB::raw("select * from question order by question_date desc, (nr_likes - nr_dislikes) desc"));

      //return view('pages.home', ['questions' => $questions]);
      return $questions;

    }

    /**
     * Opens the Question Page for a given Question id.
     *
     * @param  int  $id
     * @return Response
     */
    public function open($id)
    {
      $question = Question::find($id);
      return view('pages.question')->with('question', json_decode($question, true));
    }


}
