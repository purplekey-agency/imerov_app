<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminViewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAdminDashboard(){
        return view('admin.dashboard');
    }

    public function showUsersPage(){

        $users = User::where('type_of_user', 0)->get();
        return view('admin.users')->with(['users'=>$users]);

    }

    public function showUserPage($id){

        $user = User::where('id', $id)->first();
        return view('admin.user.dashboard')->with(['user'=>$user]);
    }

    public function showUserQuestionarePage($id){
        $user = User::where('id', $id)->first();
        return view('admin.user.questionare')->with(['user'=>$user]);
    }

    public function showUserWorksheetPage($id){
        $user = User::where('id', $id)->first();
        return view('admin.user.worksheet')->with(['user'=>$user]);
    }

    public function showUserDietPlanPage($id){
        $user = User::where('id', $id)->first();
        return view('admin.user.dietplan')->with(['user'=>$user]);
    }

    public function showUserVideosPage($id){
        $user = User::where('id', $id)->first();
        return view('admin.user.videos')->with(['user'=>$user]);
    }

    public function showUserEditProfilePage($id){
        $user = User::where('id', $id)->first();
        return view('admin.user.editprofile')->with(['user'=>$user]);
    }

    public function searchFunction(Request $request){
        dd($request->all());
    }
}
