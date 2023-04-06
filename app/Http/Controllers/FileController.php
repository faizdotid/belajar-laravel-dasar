<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $path = $request->file('pictures');
        $path->storePubliclyAs('pictures', $path->getClientOriginalName(), 'public');
        return "OK " . $path->getClientOriginalName();
    }
}
