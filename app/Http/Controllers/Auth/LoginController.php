<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

use App\QuestionLabel;
use App\Label;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function username(){
        return 'username';
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getUser(){
        return $request->user();
    }

    public function showLogin(){
        // for footer
        $p_l = QuestionLabel::select(DB::raw('label_id'))->groupBy('label_id')->orderBy(DB::raw('count(*)'), 'desc')->limit(6)->get();
        $popular_labels = [];
        $i = 0;
        foreach($p_l as $l){
            $label = Label::find($l);
            $popular_labels[$i] = $label[0]->name;
            $i++;
        }

        return view('auth.login', ['popular_labels' => $popular_labels]);
    }


}
