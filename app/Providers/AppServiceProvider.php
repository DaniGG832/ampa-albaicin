<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Access\Response;

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
        Gate::define('admin', function(User $user) {
            //dd(auth()->user());
            return  auth()->user()->admin
            ? Response::allow()
                : Response::deny('You must be an administrator.');
        });

        Gate::define('activado', function(User $user) {
            //dd(auth()->user());
            return  auth()->user()->activado
            ? Response::allow()
                : abort(401);
        });
    }
}
