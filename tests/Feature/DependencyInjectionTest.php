<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;
class DependencyInjectionTest extends TestCase
{
    function testDependency()
    {
        $foo = new Foo();
        $bar = new Bar($foo);
        self::assertEquals('Foo and Bar', $bar->bar());
    }

    function testBind()
    {
        $this->app->bind(Person::class, function ($app) {
            return new Person('Faizal', 18);
        });
        
        $person = $this->app->make(Person::class);
        self::assertEquals('Faizal', $person->name);
    }

    public function testSingleton()
    {
        $this->app->singleton(Person::class, function ($app) {
            return new Person('Faizal', 18);
        });
        
        $person = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertSame($person, $person2);
    }

    public function testInstance()
    {
        $person = new Person('Faizal', 18);
        $this->app->instance(Person::class, $person);
        
        $person2 = $this->app->make(Person::class);

        self::assertSame($person, $person2);
    }

    function testDependencyInjection()
    {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });
        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });
        $bar = $this->app->make(Bar::class);
        self::assertEquals('Foo and Bar', $bar->bar());
    }
}
