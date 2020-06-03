<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\QuestionLabel;
use App\Label;

class StaticController extends Controller
{
    public function about() {

        // for footer
        $p_l = QuestionLabel::select(DB::raw('label_id'))->groupBy('label_id')->orderBy(DB::raw('count(*)'), 'desc')->limit(6)->get();
        $popular_labels = [];
        $i = 0;
        foreach($p_l as $l){
            $label = Label::find($l);
            $popular_labels[$i] = $label[0]->name;
            $i++;
        }

        return view('pages.about', ['popular_labels' => $popular_labels]);
    }

    public function p404() {

        // for footer
        $p_l = QuestionLabel::select(DB::raw('label_id'))->groupBy('label_id')->orderBy(DB::raw('count(*)'), 'desc')->limit(6)->get();
        $popular_labels = [];
        $i = 0;
        foreach($p_l as $l){
            $label = Label::find($l);
            $popular_labels[$i] = $label[0]->name;
            $i++;
        }

        return view('errors.404', ['popular_labels' => $popular_labels]);
    }

}
