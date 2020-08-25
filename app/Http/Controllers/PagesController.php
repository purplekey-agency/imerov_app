<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showIndexPage(){
        return view('auth.login');
    }

    public function redirectToIndexPage(){
        return \redirect('/');
    }
}
