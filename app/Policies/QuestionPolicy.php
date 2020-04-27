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
      // Only a question owner can delete it
      return $user->id == $question->user_id;
    }

    public function create(User $user)
    {
      // Any Authenticated user can create a question
      return Auth::check();
    }

    public function edit(User $user, Question $question)
    {
      // Only a question owner can edit it
      return $user->id == $question->user_id;
    }
    
}