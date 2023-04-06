<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    function testConfig()
    {
        $firstName = config('contoh.name.first');
        $middleName = config('contoh.name.middle');
        $lastName = config('contoh.name.last');
        $fullName = $firstName . ' ' . $middleName . ' ' . $lastName;
        self::assertEquals('Faizal Nur Pratama', $fullName);
    }
}
