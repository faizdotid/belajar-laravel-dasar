<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHello()
    {
        $response = $this->get('/controller/hello');
        $response->assertStatus(200);
        $response->assertSee('Hello world');
    }
}
