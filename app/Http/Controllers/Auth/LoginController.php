<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo(){
        
        return '/dashboard';
    }

    protected $username;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    /**
     * Get the login username to be used by controller
     * @return string
     */

     public function findUsername(){
         $login = request()->input('email');
         $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

         request()->merge([$fieldType=>$login]);

         return $fieldType;
     }

     /**
      * Get username property
      * @return string
      */

    public function username(){
        return $this->username;
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
      }

    public function showLoginForm(){
        if(Auth::user()){
            return redirect('/dashboard');
        }
        return view('auth.login')->with('register', true);
    }
}
