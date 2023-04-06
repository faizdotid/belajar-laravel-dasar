<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFileStorage()
    {
        $filesystem = Storage::disk('local');
        $filesystem->put('test.txt', 'Hello World');
        $this->assertEquals('Hello World', $filesystem->get('test.txt'));
    }
    public function testPublic()
    {
        $filesystem = Storage::disk('public');
        $filesystem->put('test.txt', 'Hello World');
        $this->assertEquals('Hello World', $filesystem->get('test.txt'));
    }
}
