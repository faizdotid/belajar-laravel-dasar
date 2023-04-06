<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetfaiz()
    {
        $this->get('/faiz')
            ->assertStatus(200)
            ->assertSee('Faizal');
    }

    // public function testgetRedirect()
    // {
    //     $this->get('/redirect')
    //         ->assertStatus(302)
    //         ->assertRedirect('/welcome');
    // }

    function testRouteParameter()
    {
        $this->get('/products/1')
            ->assertStatus(200)
            ->assertSee('Product ID: 1');
        $this->get('/products/1/name/iphone')
            ->assertStatus(200)
            ->assertSeeText('Product ID: 1 Product Name: iphone');
    }


    function testRouteRegexParameter()
    {
        $this->get('/categories/1')
            ->assertStatus(200)
            ->assertSee('Category ID: 1');
        $this->get('/categories/1a')
            ->assertSee('404 Not Found');
    }

    function testParameterOptional()
    {
        $this->get('/users')
            ->assertStatus(200)
            ->assertSee('User ID: 404');
        $this->get('/users/paiz')
            ->assertStatus(200)
            ->assertSee('User ID: paiz');
    }
}