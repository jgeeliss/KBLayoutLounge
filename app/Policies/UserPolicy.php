<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine if the user can manage other users.
     */
    public function manageUsers(User $user): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine if the user can toggle admin status.
     */
    public function toggleAdmin(User $user, User $targetUser): bool
    {
        // Must be admin and cannot change own admin status
        return $user->is_admin && $user->id !== $targetUser->id;
    }
}
