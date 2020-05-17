<?php

namespace App\Policies;

use App\User;
use App\Comment;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
      // Any Authenticated user can reply to a question
      return Auth::check();
    }

    public function delete(User $user, Comment $comment)
    {
      // Only a comment owner or an admin can delete it
      return $user->id == $comment->user_id || $user->getUserCurrentRole() == 'administrator';
    }

    public function edit(User $user, Comment $comment)
    {
      // Only a comment owner, an admin or a moderator can edit it
      return $user->id == $comment->user_id || $user->getUserCurrentRole() == 'administrator' || $user->getUserCurrentRole() == 'moderator';
    }
    
}