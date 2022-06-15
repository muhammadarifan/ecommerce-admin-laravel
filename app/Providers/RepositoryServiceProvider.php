<?php

namespace App\Providers;

use App\Repositories\CustomerMessageRepository;
use App\Repositories\Impl\CustomerMessageRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\UserRepository;
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
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(CustomerMessageRepository::class, CustomerMessageRepositoryImpl::class);
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
