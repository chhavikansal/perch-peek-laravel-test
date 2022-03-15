<?php

namespace App\Providers;

use App\Contracts\Repositories\RepositoryInterface;
use App\Contracts\Repositories\TicketsRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\TicketsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, BaseRepository::class);
        $this->app->bind(TicketsRepositoryInterface::class, TicketsRepository::class);
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
