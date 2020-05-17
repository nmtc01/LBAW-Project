<?php

namespace App\Policies;

use App\User;
use App\Question;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Question $question)
    {
      // Only a question owner or an admin can delete it
      return $user->id == $question->user_id || $user->getUserCurrentRole() == 'administrator';
    }

    public function create(User $user)
    {
      // Any Authenticated user can create a question
      return Auth::check();
    }

    public function edit(User $user, Question $question)
    {
      // Only a question owner, an admin or a moderator can edit it
      return $user->id == $question->user_id || $user->getUserCurrentRole() == 'administrator' || $user->getUserCurrentRole() == 'moderator';
    }
    
}