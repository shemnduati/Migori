<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Gate::define('isAdmin',function ($user){
            return $user-> role == 'admin';
        });
        Gate::define('isSubadmin',function ($user){
            return $user-> role == 'sub-admin';
        });
        Gate::define('isStudent',function ($user){
        return $user-> role == 'student';
        });
        Gate::define('isOfficial',function ($user){
            return $user-> role == 'official';
        });
        Gate::define('isAdminOrSubadmin',function ($user){
            return $user-> role == 'admin' || $user-> role == 'sub-admin';
       });
        Gate::define('isSubadminOrOfficial',function ($user){
            return $user-> role == 'sub-admin' || $user-> role == 'official';
        });
    }
}
