<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

use App\QuestionLabel;
use App\Label;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:200|unique:user',
            'bio' => 'required|string|max:500',
            'username' => 'required|string|max:100|unique:user',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'bio' => $data['bio'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showRegistration(){
        // for footer
        $p_l = QuestionLabel::select(DB::raw('label_id'))->groupBy('label_id')->orderBy(DB::raw('count(*)'), 'desc')->limit(6)->get();
        $popular_labels = [];
        $i = 0;
        foreach($p_l as $l){
            $label = Label::find($l);
            $popular_labels[$i] = $label[0]->name;
            $i++;
        }

        return view('auth.register', ['popular_labels' => $popular_labels]);
    }
    
    
}
