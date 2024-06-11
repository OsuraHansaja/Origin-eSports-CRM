<?php

namespace App\Policies;

use App\Models\ForumPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the forum post.
     */
    public function update(User $user, ForumPost $forumPost)
    {
        return $user->id === $forumPost->user_id;
    }

    /**
     * Determine whether the user can delete the forum post.
     */
    public function delete(User $user, ForumPost $forumPost)
    {
        return $user->id === $forumPost->user_id;
    }
}

