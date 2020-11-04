<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    //lien entre eloquent et interface
    public $bindings=[
        AdminRepositoryInterface::class=>EloquentAdminRepository::class,
        EmployeeRepositoryInterface::class=>EloquentEmployeeRepository::class,
        FichesRepositoryInterface::class=>EloquentFichesRepository::class,
        MedecinRepositoryInterface::class=>EloquentMedecinRepository::class,
    ];
    
    public function register()
    {
        //

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
