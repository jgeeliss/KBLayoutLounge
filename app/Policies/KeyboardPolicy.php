<?php

namespace App\Policies;

use App\Models\Keyboard;
use App\Models\User;

// note: created by running "php artisan make:policy KeyboardPolicy --model=Keyboard"
class KeyboardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Keyboard $keyboard): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Admins cannot create keyboard layouts
        return ! $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Keyboard $keyboard): bool
    {
        // Only the owner can update
        return $user->id === $keyboard->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Keyboard $keyboard): bool
    {
        // Only the owner or admin can delete
        return $user->id === $keyboard->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Keyboard $keyboard): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Keyboard $keyboard): bool
    {
        return false;
    }

    /**
     * Determine whether the user can rate the keyboard.
     * Users cannot rate their own keyboard layouts.
     * Admins cannot rate keyboard layouts.
     */
    public function rate(User $user, Keyboard $keyboard): bool
    {
        return $keyboard->user_id !== $user->id && ! $user->isAdmin();
    }
}
