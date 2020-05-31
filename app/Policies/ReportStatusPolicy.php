<?php

namespace App\Policies;

use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ReportStatusPolicy
{
    use HandlesAuthorization;

    public function resolve(User $user)
    {
      // Only an admin or a moderator can resolve a report
      return $user->getUserCurrentRole() == 'administrator' || $user->getUserCurrentRole() == 'moderator';
    }
}