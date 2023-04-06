<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetConfig()
    {
        $name = Config::get('contoh.author');
        self::assertSame('Faizal', $name);
        //var_dump(Config::all());
    }

    public function testShouldReceive()
    {
        Config::shouldReceive('get')
            ->once()
            ->with('contoh.author')
            ->andReturn('Hello');

        $name = Config::get('contoh.author');
        self::assertSame('Hello', $name);
    }
}
