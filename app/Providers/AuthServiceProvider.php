<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //to check admin
        Gate::define('access-admin', function ($user) {
            return $user->is_admin;
        });

        function isUserAdmin() {
        return Gate::allows('access-admin');
        }
        // $linkUrl = isUserAdmin() ? "http://localhost/Projects/authentic/public/admin" : "http://localhost/Projects/authentic/public/user";
    }
}
