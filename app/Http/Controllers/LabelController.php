<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Label;

class LabelController extends Controller
{
    public function startLabel(Request $request) 
    {
      $label = new Label();

      $this->authorize('start', $label);
    }

    /**
     * Creates a new label.
     *
     * @return Label The label created.
     */
    public function create(Request $request)
    {
      //Create label
      $label = new Label();

      $this->authorize('create', $label);

      $label->name = $request->input('name');
      $label->save();

      //Create question_label
      DB::table('question_label')->insert([
        ['question_id' => $request->input('question_index'), 'label_id' => $label->id]
      ]);

      return $label;
    }

    /**
     * Shows the Question's labels from a given id.
     *
     * @param  int  $id
     * @return Response
     */
    public function list($id)
    {
        $labels = DB::select(DB::raw("select label.name from question_label, label where question_label.question_id = $id and question_label.label_id = label.id"));

        return $labels;
    }
}