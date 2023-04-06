<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    function createSession(Request $request)
    {
        $request->session()->put('name', 'Faizal');
        $request->session()->put('isLogin', true);
        return redirect()->route('session.show');
    }

    function showSession(Request $request)
    {
        $sess = $request->session()->all();
        return $sess;
    }

    function deleteSession(Request $request)
    {   
        $request->session()->flush();
        return redirect()->route('session.show');
    }
}
