<?php

namespace App\Policies;

use App\Models\User;

class OwnerPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole('owner');
    }

    public function view(User $user, User $model)
    {
        return $user->hasRole('owner') && $model->hasRole('staff');
    }

    public function create(User $user)
    {
        return $user->hasRole('owner');
    }

    public function update(User $user, User $model)
    {
        return $user->hasRole('owner') && $model->hasRole('staff');
    }

    public function delete(User $user, User $model)
    {
        return $user->hasRole('owner') && $model->hasRole('staff');
    }

    public function __construct()
    {
        //
    }
}