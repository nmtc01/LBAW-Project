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
      $question_label = new Question_Label();

      $question_label->question_id = $request->input('question_index');
      $question_label->label_id = $label->id;
      $question_label->save();

      return $label->name;
    }
}