<?php

namespace IntelGUA\Sisaludent\Providers;

use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         {
            Permission::get()->map(function($permission){
                Gate::define($permission->slug, function($user) use ($permission){
                 return $user->hasPermissionTo($permission);
                });
            });
        }
}

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
