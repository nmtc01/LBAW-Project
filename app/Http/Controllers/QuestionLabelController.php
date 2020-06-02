<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\QuestionLabel;

class QuestionLabelController extends Controller
{
    public function __construct(){
        $this->userController = new UserController();
    }

    public function getPopularLabels(){
        return QuestionLabel::select(DB::raw('label_id'))->groupBy('label_id')->orderBy(DB::raw('count(*)'), 'desc')->limit(6)->get();
    }
}