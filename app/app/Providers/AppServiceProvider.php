<?php

namespace App\Providers;

use App\Interfaces\UserDealer\UserDealerInterface;
use App\Repositores\UserDealer\Type\TypeUser;
use App\Repositores\UserDealer\Type\TypeUserStrategyFactory;
use App\Repositores\UserDealer\Type\TypeUserInterface;
use App\Repositores\UserDealer\UserDealerRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserDealerInterface::class,UserDealerRepository::class);
        $this->app->bind(TypeUserInterface::class,TypeUser::class);
        $this->app->bind(TypeUserInterface::class,TypeUserStrategyFactory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
