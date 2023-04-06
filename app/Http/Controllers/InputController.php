<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request)
    {
        $name = $request->input('name', 'world');
        return 'Hello ' . $name;
    }

    public function helloFirstname(Request $request)
    {
        $firstName = $request->input('name.first', 'world');
        $middleName = $request->input('name.middle', 'world');
        $lastName = $request->input('name.last', 'world');
        return 'Hello ' . $firstName . ' ' . $middleName . ' ' . $lastName;
    }

    public function helloAll(Request $request)
    {
        $name = $request->input();
        return  json_encode($name);
    }

    function filterOnly(Request $request)
    {
        $name = $request->only(['name.first', 'name.last']);
        return json_encode($name);
    }

    function filterExcept(Request $request)
    {
        $name = $request->except(['name.first', 'name.last']);
        return json_encode($name);
    }

    function filterMerge(Request $request)
    {
        $name = $request->merge(['name.first' => 'faiz', 'name.last' => 'amin']);
        return json_encode($name);
    }
}
