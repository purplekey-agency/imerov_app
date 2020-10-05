<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserQuestionare;   

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboardPage(){
        return view('user.dashboard');
    }

    public function showQuestionarePage(){
        $userQuestionare = UserQuestionare::where('user_id', Auth::User()->id)->first();
        return view('user.questionare')->with(['userQuestionare'=>$userQuestionare]);
    }

    public function showWorksheetPage(){
        return view('user.worksheet');
    }

    public function showDietPlanPage(){
        return view('user.dietplan');
    }

    public function showVideosPage(){
        return view('user.videos');
    }

    public function updateQuestionare(Request $request){
        dd($request);
    }
}
