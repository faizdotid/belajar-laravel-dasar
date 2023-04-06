<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Foo;
use App\Data\Bar;
use App\Services\HelloServiceIndonesia;
use App\Services\HelloService;
use Illuminate\Contracts\Support\DeferrableProvider;

class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public array $singletons = [
        HelloService::class => HelloServiceIndonesia::class,
    ];

    public function register()
    {
        //echo "FooBarServiceProvider";
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });
        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });
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

    public function provides()
    {
        return [Foo::class, Bar::class, HelloService::class];
    }
}