<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\App;

class AppEnvironmentTest extends TestCase
{
    function testAppEnv()
    {
        if(App::environment('testing')) {
            self::assertTrue(true);
        }
    }
}
