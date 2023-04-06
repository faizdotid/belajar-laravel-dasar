<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Foo;
use App\Data\Bar;


class FooBarServiceProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    function testFooBarServiceProvider()
    {
        $app1 = $this->app->make(Foo::class);
        $app3 = $this->app->make(Foo::class);
        $this->assertSame($app1, $app3);

    }
}
