<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    function testGetEnv()
    {
        $appAuthor = env('AUTHOR');
        self::assertEquals('Faizal', $appAuthor);
    }
}
