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

      $answer = new Answer();

      $answer->content = $request->input('content');
      $answer->user_id = Auth::user()->id;
      $answer->question_id = $request->input('question_index');

      $username = Auth::user()->username;
      $user_score = Auth::user()->score;

      $answer->save();

      $info = [$answer->content, $username, $user_score];

      //return $answer;
      return $info;
    }

    public function delete(Request $request, $id)
    {
      $answer = Answer::find($id);

      $this->authorize('delete', $answer);
      $answer->delete();

      return $answer;
    }


}
