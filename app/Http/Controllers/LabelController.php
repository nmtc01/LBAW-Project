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
}