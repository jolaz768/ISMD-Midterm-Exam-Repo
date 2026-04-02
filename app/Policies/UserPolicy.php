<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    protected function isAdmin(User $user): bool
    {
        return $user->hasRole('admin');
    }

    protected function isOwner(User $user): bool
    {
        return $user->hasRole('owner');
    }

    protected function isStaff(User $user): bool
    {
        return $user->hasRole('staff');
    }

    /**
     * Determine whether the user can view any users.
     */
    public function viewAny(User $user): bool
    {
        return $this->isAdmin($user) || $this->isOwner($user) || $this->isStaff($user);
    }

    /**
     * Determine whether the user can view a user.
     */
    public function view(User $user, User $model): bool
    {
        if ($this->isAdmin($user)) {
            return true;
        }

        if ($this->isOwner($user)) {
            // Owner can view staff users (and self if needed)
            return $model->hasRole('staff') || $model->id === $user->id;
        }

        if ($this->isStaff($user)) {
            // Staff may only view themselves or other staff, no editing rights
            return $model->hasRole('staff') || $model->id === $user->id;
        }

        return false;
    }

    /**
     * Determine whether the user can create users.
     */
    public function create(User $user): bool
    {
        return $this->isAdmin($user) || $this->isOwner($user);
    }

    /**
     * Determine whether the user can update users.
     */
    public function update(User $user, User $model): bool
    {
        if ($this->isAdmin($user)) {
            return true;
        }

        return $this->isOwner($user) && $model->hasRole('staff');
    }

    /**
     * Determine whether the user can delete users.
     */
    public function delete(User $user, User $model): bool
    {
        if ($this->isAdmin($user)) {
            return $user->id !== $model->id;
        }

        return $this->isOwner($user) && $model->hasRole('staff') && $user->id !== $model->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $this->isAdmin($user);
    }
}

