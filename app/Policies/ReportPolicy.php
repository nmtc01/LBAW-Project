<?php

namespace App\Policies;

use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ReportPolicy
{
    use HandlesAuthorization;

    public function createQ(User $user)
    {
      // Any Authenticated user can report a question
      return Auth::check();
    }

    public function createA(User $user)
    {
      // Any Authenticated user can report an answer
      return Auth::check();
    }

    public function createC(User $user)
    {
      // Any Authenticated user can report a comment
      return Auth::check();
    }

}