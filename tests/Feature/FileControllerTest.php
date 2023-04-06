<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpload()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');
        $response = $this->post('/controller/upload', [
            'pictures' => $file,
        ]);
        self::assertEquals('OK avatar.jpg', $response->getContent());
    }
}
