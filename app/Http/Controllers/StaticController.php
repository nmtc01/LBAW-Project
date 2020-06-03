<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function about() {
        return view('pages.about', []);
    }

    public function p404() {
        return view('errors.404', []);
    }

}
