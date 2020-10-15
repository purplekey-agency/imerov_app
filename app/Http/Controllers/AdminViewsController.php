<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserQuestionare;
use App\UserVideos;

class AdminViewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAdminDashboard(){
        $inactiveusers = count(User::where('type_of_user', 0)->where('subscription_type', 0)->get());
        $activeusers = count(User::where('type_of_user', 0)->where('subscription_type', 1)->get());

        return view('admin.dashboard')->with(['inactiveusers'=>$inactiveusers, 'activeusers'=>$activeusers]);
    }

    public function showUsersPage(){

        $users = User::where('type_of_user', 0)->get();
        return view('admin.users')->with(['users'=>$users]);

    }

    public function showUserPage($id){

        $user = User::where('id', $id)->first();
        $birthday = UserQuestionare::where('user_id', $id)->first();
        $birthday = $birthday->date_of_birth;

        return view('admin.user.dashboard')->with(['user'=>$user, 'birthday'=>$birthday]);
    }

    public function showUserQuestionarePage($id){
        $user = User::where('id', $id)->first();
        $userQuestionare = UserQuestionare::where('user_id', $user->id)->first();
        return view('admin.user.questionare')->with(['user'=>$user, 'userQuestionare'=>$userQuestionare]);
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

    public function showAdminMessagesPage(){
        return view('admin.messages');
    }

    public function showAdminUploadPage(){
        $users = User::where('type_of_user', 0)->get();
        $videos = UserVideos::all();
        return view('admin.upload')->with(['users'=>$users, 'videos'=>$videos]);
    }

    public function showAdminVideosPage(){
        return view('admin.videos');
    }

    public function searchFunction(Request $request){
        dd($request->all());
    }

    public function updateSpreadsheet(Request $request){
        
    }
}
