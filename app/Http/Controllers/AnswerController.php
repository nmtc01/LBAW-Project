<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Answer;

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

    /**
     * Creates a new answer.
     *
     * @return Answer The answer created.
     */
    public function create(Request $request)
    {
      //$this->authorize('create', $answer);

      $answer = new Answer();

      $this->authorize('create', $answer);

      $answer->content = $request->input('content');
      $answer->user_id = Auth::user()->id;
      $answer->question_id = $request->input('question_index');
      $answer->save();
      
      $username = Auth::user()->username;
      $user_score = Auth::user()->score;

      $info = [$answer->content, $username, $user_score, $answer->id];

      return $info;
    }

    public function delete(Request $request, $id)
    {
      $answer = Answer::find($id);

      $this->authorize('delete', $answer);
      $answer->delete();

      return $answer;
    }

    public function edit(Request $request, $id) 
    {
      $answer = Answer::find($id);

      $this->authorize('edit', $answer);

      $answer->user_id = Auth::user()->id;
      $answer->content = $request->input('content');
      $username = Auth::user()->username;

      $date = date('Y-m-d');
      
      $info = [$answer->content, $username, $date, $id];

      return $info;

    }

    public function update(Request $request, $id) 
    {
      $answer = Answer::find($id);

      $this->authorize('edit', $answer);

      $answer->user_id = Auth::user()->id;
      $answer->content = $request->input('content');
      $username = Auth::user()->username;

      $date = date('Y-m-d');

      $answer->save();
      
      $info = [$answer->content, $username, $date, $id];

      return $info;

    }

}
