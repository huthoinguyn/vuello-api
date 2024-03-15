<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider{

    /**
     * Register services.
     */
    public function register()
    : void{

        $this->app->bind(
            \App\Interfaces\BaseRepositoryInterface::class,
            \App\Repositories\BaseRepository::class
        );

        $this->app->bind(
            \App\Interfaces\BoardRepositoryInterface::class,
            \App\Repositories\BoardRepository::class
        );

        $this->app->bind(
            \App\Interfaces\ColumnRepositoryInterface::class,
            \App\Repositories\ColumnRepository::class
        );

        $this->app->bind(
            \App\Interfaces\CardRepositoryInterface::class,
            \App\Repositories\CardRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    : void{
        //
    }
}
