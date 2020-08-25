<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showIndexPage(){

        $register = true;

        return view('auth.login')->with('register', $register);
    }

    public function redirectToIndexPage(){
        return \redirect('/');
    }
}
