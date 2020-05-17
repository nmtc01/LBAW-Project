<?php

namespace App\Policies;

use App\User;
use App\Answer;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Answer $answer)
    {
      // Only an answer owner or an admin can delete it
      return $user->id == $answer->user_id || $user->getUserCurrentRole() == 'administrator';
    }

    public function create(User $user)
    {
      // Any Authenticated user can reply to a question
      return Auth::check();
    }

    public function edit(User $user, Answer $answer)
    {
      // Only an answer owner, an admin or a moderator can edit it
      return $user->id == $answer->user_id || $user->getUserCurrentRole() == 'administrator' || $user->getUserCurrentRole() == 'moderator';
    }

    /*public function show(User $user, Card $card)
    {
      // Only a card owner can see it
      return $user->id == $card->user_id;
    }

    public function list(User $user)
    {
      // Any user can list its own cards
      return Auth::check();
    }*/

    public function setBestAnswer(User $user){

      return Auth::check();

    }

}