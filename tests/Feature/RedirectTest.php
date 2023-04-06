<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRedirect()
    {
        $response = $this->get('/redirect/to');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
