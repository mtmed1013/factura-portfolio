<?php

namespace App\Providers;

use App\Interfaces\IClientsService;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\IProductsRepository;
use App\Interfaces\IClientsRepository;
use App\Interfaces\IFactDetailsRepository;
use App\Interfaces\IFactDetailsService;
use App\Interfaces\IFactRepository;
use App\Interfaces\IFactService;
use App\Interfaces\IProductsService;
use App\Repositories\ClientRepository;
use App\Services\ClientService;
use App\Services\ProductService;
use App\Repositories\ProductRepository;
use App\Repositories\FactDetailsRepository;
use App\Repositories\FactRepository;
use App\Services\FactsDetailsService;
use App\Services\FactService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IProductsService::class, ProductService::class);
        $this->app->bind(IClientsService::class, ClientService::class);
        $this->app->bind(IProductsRepository::class, ProductRepository::class);
        $this->app->bind(IClientsRepository::class, ClientRepository::class);
        $this->app->bind(IFactDetailsService::class, FactsDetailsService::class);
        $this->app->bind(IFactDetailsRepository::class, FactDetailsRepository::class);
        $this->app->bind(IFactService::class, FactService::class);
        $this->app->bind(IFactRepository::class, FactRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
