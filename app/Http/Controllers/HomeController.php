<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show() {
        return view('pages.home',[]);
    }

    public function home() {
        return redirect('home');
    }

}
