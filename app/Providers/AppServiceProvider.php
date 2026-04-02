<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Allow admin to bypass policy checks globally (faster and simpler)
        Gate::before(function (User $user, string $ability, $model = null) {
            if ($user->hasRole('admin')) {
                return true;
            }

            return null;
        });

        // Register only one policy for User model and handle all role rules there
        Gate::policy(User::class, UserPolicy::class);
    }
}
