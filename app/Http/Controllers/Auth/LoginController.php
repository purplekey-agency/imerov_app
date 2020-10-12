<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\User;

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

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $decrypted = $request->input('password');
        
        if(strpos($request->email, '@') !== false){
            $user      = User::where('email', $request->input('email'))->first();
        }
        else{
            $user      = User::where('username', $request->input('email'))->first();
        }

        if ($user) {
            if (Crypt::decrypt($user->password) == $decrypted) {
                Auth::login($user);
                return $this->sendLoginResponse($request);
            }
        }

        return $this->sendFailedLoginResponse($request);
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
