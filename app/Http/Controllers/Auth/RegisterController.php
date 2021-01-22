<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use File;

use App\UserQuestionare;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        #dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:3','regex:/^[a-zA-Z]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirmpassword'],
            'surename' => ['required', 'string', 'max:255', 'min:3','regex:/^[a-zA-Z]+$/u'],
            'username' => ['required', 'string', 'max:255', 'min:3', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        #File::makeDirectory(public_path().'/storage/'.$data['username'].'/spreadsheets/', 0777, true);
        #File::put(public_path().'/storage/'.$data['username'].'/spreadsheets/worksheet.csv', '');
        #File::put(public_path().'/storage/'.$data['username'].'/spreadsheets/dietplan.csv', '');
        #File::makeDirectory(public_path().'/storage/'.$data['username'].'/images/', 0777, true);

        $user = new User();
        $user->name = $data['name'];
        $user->surename = $data['surename'];
        $user->username = $data['username'];
        $user->email = $data['email'];
        #$user->worksheet = public_path().'/storage/'.$data['username'].'/spreadsheets/worksheet.csv';
        #$user->diet_plan = public_path().'/storage/'.$data['username'].'/spreadsheets/dietplan.csv';
        $user->password = Crypt::encrypt($data['password']);
        $user->save();

        $userQuestionare = new UserQuestionare();
        $userQuestionare->user_id = $user->id;
        $userQuestionare->name = $data['name'];
        $userQuestionare->surename = $data['surename'];
        $userQuestionare->email = $data['email'];

        $userQuestionare->save();



        return $user;



        /*return User::create([
            'name' => $data['name'],
            'surename' => $data['surename'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/
    }
}
