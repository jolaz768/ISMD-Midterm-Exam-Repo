<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function before(User $user): ?bool
    {
        if ($user->hasRole('admin')) {
            return true; // Admin can do everything
        }

        return null; // Defer to other methods for non-admin users
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['owner', 'employee']); // Check if user has permission to view users
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->hasAnyRole(['owner', 'employee']); // Allow users to view their own profile
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['owner']); // Allow users with specific roles to create models
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->hasAnyRole(['owner']) ; // Allow users to edit their own profile
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->hasAnyRole(['owner']) ; // Allow users to delete other users but not themselves
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->hasAnyRole(['owner']); // Allow users to restore their own profile
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->hasAnyRole(['owner']); // Allow users to permanently delete their own profile
    }
}
