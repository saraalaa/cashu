<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('sales', function (User $user) {
            return $user->roles()->wherePivotIn('role_id', [Role::ADMIN, Role::SALES])->count() > 0;
        });

        Gate::define('configuration', function (User $user) {
            return $user->roles()->wherePivotIn('role_id', [Role::ADMIN, Role::BACK_OFFICE])->count() > 0;
        });
    }
}
