<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;   

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
        return view('user.questionare');
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
}
