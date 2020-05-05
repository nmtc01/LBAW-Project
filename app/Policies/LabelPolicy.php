<?php

namespace App\Policies;

use App\User;
use App\Label;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class LabelPolicy
{
    use HandlesAuthorization;

    public function start(User $user)
    {
      // Any Authenticated user can start a label
      return Auth::check();
    }
    
}