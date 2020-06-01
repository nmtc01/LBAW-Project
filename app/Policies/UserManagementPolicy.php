<?php

namespace App\Policies;

use App\User;
use App\UserManagement;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserManagementPolicy
{
    use HandlesAuthorization;

    public function promote(User $user, UserManagement $status, User $promoted_user)
    {
      // Only administrators can promote users
      return $user->getUserCurrentRole() == 'administrator' && $user->id != $promoted_user->id;
    }

    public function demote(User $user, UserManagement $status, User $demoted_user)
    {
      // Only administrators can demote users
      return $user->getUserCurrentRole() == 'administrator' && $user->id != $demoted_user->id;
    }

}