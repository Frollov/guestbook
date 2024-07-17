<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends \Illuminate\Foundation\Support\Providers\AuthServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('create-comment', function (User $user) {
            return $user;
        });

        Gate::define('create-answer', function (User $user) {
            return $user->role_id === 1;
        });
    }
}
