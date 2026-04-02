<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, User $model)
        {
            // Only allow deletion if the user has the 'admin' role and is not trying to delete themselves
            return $user->hasRole('admin') && $user->id !== $model->id;
        }

        public function update(User $user, User $model)
        {
            // Only allow update if the user has the 'admin' role and is not trying to update themselves
            return $user->hasRole('admin') && $user->id !== $model->id;
        }

        public function view(User $user, User $model)
        {
            // Allow viewing if the user has the 'admin' role or is trying to view their own profile
            return $user->hasRole('admin') || $user->id === $model->id;
        }

        public function viewAny(User $user)
        {
            // Allow viewing any user if the user has the 'admin' role
            return $user->hasRole('admin');
        }

        public function create(User $user)
        {
            // Allow creating a user if the user has the 'admin' role
            return $user->hasRole('admin');
        }   

    public function __construct()
    {
        //
    }
}
