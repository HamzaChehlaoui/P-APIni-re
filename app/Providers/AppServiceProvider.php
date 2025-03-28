<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DAO\PlantDAOInterface;
use App\DAO\OrderDAOInterface;
use App\DAO\PlantDAO;
use App\DAO\OrderDAO;
use App\Repositories\PlantRepositoryInterface;
use App\Repositories\PlantRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Auth;
use App\Guards\JwtGuard;
use App\Services\JWTService;
use App\Providers\JwtUserProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind DAO
        $this->app->bind(PlantDAOInterface::class, PlantDAO::class);
        $this->app->bind(OrderDAOInterface::class, OrderDAO::class);

        // Bind Repositories
        $this->app->bind(PlantRepositoryInterface::class, PlantRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

        // Register the custom guard
        Auth::extend('jwt', function ($app, $name, array $config) {
            return new JwtGuard(
                new JwtUserProvider(),
                $app['request'],
                new JWTService(),
            );
        });


    /**
     * Bootstrap any application services.
     */
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
