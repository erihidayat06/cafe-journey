<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\Cafe;
use Illuminate\Support\Facades\Gate;

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
        //
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        Gate::define('admin', function (User $user) {
            return $user->is_admin === 'admin';
        });

        Gate::define('admin_web', function (User $user) {
            return $user->is_admin === 'admin_web';
        });

        Gate::define('bukan_admin', function (User $user) {
            return $user->is_admin === 'bukan_admin';
        });
    }
}
