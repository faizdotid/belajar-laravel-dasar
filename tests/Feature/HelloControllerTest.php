<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testController()
    {
        $this->get('/controller/hello')
            ->assertStatus(200)
            ->assertSee('Hello world');
    }

    public function testControllerWithParameter()
    {
        $this->get('/controller/hello/faiz')
            ->assertStatus(200)
            ->assertSee('Hello faiz');
    }

    public function testControllerWithRequest()
    {
        $this->get('/controller/hello/request')
            ->assertStatus(200)
            ->assertSee('controller/hello/request')
            ->assertSee('GET');
    }
}
