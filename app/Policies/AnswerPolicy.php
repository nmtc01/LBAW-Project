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
      // Only a answer owner can delete it
      return $user->id == $answer->user_id;
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
    }

    public function create(User $user)
    {
      // Any user can create a new card
      return Auth::check();
    }*/
}