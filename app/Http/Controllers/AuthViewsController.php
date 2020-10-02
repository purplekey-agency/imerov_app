<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthViewsController extends Controller
{
    public function showIndexPage(){
        if(Auth::user())
        return view('auth.register');
    }

    public function showLoginPage(){

        #dd($register);
        return view('auth.login')->with('register', $register);
    }
}
