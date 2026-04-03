<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

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
        // Register the UserPolicy for the User model
        Gate::policy(User::class, UserPolicy::class);

        // Allow admin to bypass policy checks globally (faster and simpler)
        Gate::before(function (User $user) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });

        // Use UserPolicy methods for user model permissions
        // and avoid custom Gate::define() rules that may conflict with policy behaviour.
        // (The `before()` method in UserPolicy already grants full access to admin.)
    }
}
