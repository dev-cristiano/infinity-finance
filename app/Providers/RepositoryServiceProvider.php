<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ReceitaRepositoryInterface;
use App\Repositories\ReceitaRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register service.
     */
    public function register()
    {
        $this->app->bind(
            ReceitaRepositoryInterface::class,
            ReceitaRepository::class
        );
    }

    /**
     * Bootstrap service.
     */
    public function boot(): void
    {
        //
    }
}
