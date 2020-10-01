<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthViewsController extends Controller
{
    public function showIndexPage(){
        return view('auth.register');
    }

    public function showLoginPage(){
        $register = true;
        dd($register);
        return view('auth.login')->with('register', $register);
    }
}
