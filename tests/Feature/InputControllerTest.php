<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGet()
    {
        $this->get('/controller/input?name=faiz')
            ->assertStatus(200)
            ->assertSee('Hello faiz');
    }

    public function testPost()
    {
        $this->post('/controller/input', ['name' => 'faiz'])
            ->assertStatus(200)
            ->assertSee('Hello faiz');
    }

    function testGethelloFirstname()
    {
        $this->post('/controller/input/firstname', ['name' => ['first' => 'faiz',
            'middle' => 'al',
            'last' => 'amin']])
            ->assertStatus(200)
            ->assertSee('Hello faiz');
    }

    function testPosthelloAll()
    {
        $response = $this->post('/controller/input/all', ['name' => ['first' => 'faiz',
            'middle' => 'al',
            'last' => 'amin',
            'hobbies' => ['music', 'sport', 'reading']]]);
        var_dump($response->getContent());
    }
}
