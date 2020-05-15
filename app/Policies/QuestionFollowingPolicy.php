<?php

namespace App\Policies;

use App\User;
use App\QuestionFollowing;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class QuestionFollowingPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
      // Any Authenticated user can follow a question
      return Auth::check();
    }
    
    public function delete(User $user, $question_followed)
    {
      // Only a question_followed owner can delete it
      return $user->id == $question_followed->user_id;
    }
}