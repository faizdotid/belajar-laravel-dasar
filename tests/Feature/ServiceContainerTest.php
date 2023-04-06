<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Bar;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;

class ServiceContainerTest extends TestCase
{
    public function testDependencyInjection()
    {
        $foo = $this->app->make('App\Data\Foo');
        $bar = $this->app->make(Bar::class);
        self::assertEquals('Foo and Bar', $bar->bar());
    }

    public function testInterfaceToClass()
    {
        #$this->app->singleton(HelloService::class, HelloServiceIndonesia::class);
        $this->app->bind(HelloService::class, function ($app) {
            return new HelloServiceIndonesia();
        });
        $helloService = $this->app->make(HelloService::class);
        self::assertEquals('Hello Faizal', $helloService->hello('Faizal'));
    }
}
