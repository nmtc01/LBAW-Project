<?php

namespace App\Policies;

use App\User;
use App\Vote;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class VotePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
      // Any Authenticated user can reply to a question
      return Auth::check();
    }
}