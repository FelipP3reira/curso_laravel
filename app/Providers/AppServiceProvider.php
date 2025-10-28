<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Produto;
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
        $categoriasMenu = categoria::all();
        view()->share('categoriasMenu',$categoriasMenu);

        Gate::define('ver-produto',function(User $user, Produto $produto) {
            return $user->id == $produto->id_user;
    });
}
}