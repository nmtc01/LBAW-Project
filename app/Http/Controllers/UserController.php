<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\User;
use App\UserManagement;

class UserController extends Controller
{
    

    /**
     * Shows all questions.
     *
     * @return Response
     */
    public function list()
    {

      //$this->authorize('list', Question::class);

      $users = User::all();

      //return view('pages.home', ['questions' => $questions]);
      return $users;

    }

    public function getUsername($id)
    {
      $username = User::where('id', $id)->first();

      return $username;
    }
}