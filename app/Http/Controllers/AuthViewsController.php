<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthViewsController extends Controller
{
    public function showIndexPage(){
        
        if(Auth::user()){
            return redirect()->back();
        }
        return view('auth.register');
    }

    public function showLoginPage(){

        #dd($register);
        return view('auth.login')->with('register', $register);
    }
}
