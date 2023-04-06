<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    public function response(Response $response)
    {
        return response('Hello response')
            ->header('Content-Type', 'text/plain')
            ->setStatusCode(200);
    }
}
