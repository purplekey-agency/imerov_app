<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;   

class PagesController extends Controller
{
    public function showIndexPage(){

        if(Auth::user()){
            if(Auth::user()->hasVerifiedEmail()){
                return redirect('/dashboard');
            }
            else{
                return redirect('/verify');
            }
        }
        else{
            $register = true;

            return view('auth.login')->with('register', $register);
        }
    }

    public function redirectToIndexPage(){
        return \redirect('/');
    }

    public function showVerifyPage(){
        return view('auth.verify');
    }

    public function showDashboardPage(){
        if(Auth::user()->hasVerifiedEmail()){
            return view('dashboard');
        } else {
            return redirect('/verify');
        }
    }
}
