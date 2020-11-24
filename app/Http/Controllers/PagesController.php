<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserQuestionare;
use App\SubscriptionType;
use App\Comments;
use App\UserDietPlan;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('subtype', ['except'=>['selectSubscriptionType','updateSubscriptionType']]);
    }

    public function showDashboardPage(){

        $userQuestionare = UserQuestionare::where('user_id', Auth::user()->id)->first();
        $newMessages = Comments::where('receipent_id', Auth::user()->id)->where('status', false)->get();
        $allMessages = Comments::where('receipent_id', Auth::user()->id)->where('status', true)->get();

        return view('user.dashboard')->with(['userQuestionare'=>$userQuestionare, 'newMessages'=>$newMessages, 'allMessages'=>$allMessages]);
    }

    public function showQuestionarePage(){
        $userQuestionare = UserQuestionare::where('user_id', Auth::User()->id)->first();
        return view('user.questionare')->with(['userQuestionare'=>$userQuestionare]);
    }

    public function showWorksheetPage(){
        return view('user.worksheet');
    }

    public function showDietPlanPage(){

        $user = Auth::user();

        $today = \Carbon\Carbon::now()->format('Y-m-d');

        $userDiets = UserDietPlan::where('user_id', $user->id)->where('date', '>=', $today)->take(7)->get();

        $todaysDiet = false;

        foreach($userDiets as $userDiet){
            if($userDiet->date == $today){
                $todaysDiet = true;

                return redirect('/diet-plan/' . $userDiet->date);
            }
        }

        return view('user.dietplan')->with(['userDiets'=>$userDiets, 'todaysDiet'=>$todaysDiet, 'userDiets'=>$userDiets]);
    }

    public function showDietPlanPageWithParam($date){
        $userDiet = UserDietPlan::where('date', $date)->where('user_id', Auth::user()->id)->get();
        dd($userDiet);

        return view('user.todaydietplan')->with(['userDiet'=>$userDiet]);
    }

    public function showVideosPage(){
        return view('user.videos');
    }

    public function showVideoPage($parameter){
        return view('user.video')->with('parameter', $parameter);
    }

    public function updateQuestionare(Request $request){
        #dd($request->all());

        $userQuestionare = UserQuestionare::where('user_id', Auth::user()->id)->first();


        $userQuestionare->user_id = Auth::user()->id;
        $userQuestionare->name = $request->first_name;
        $userQuestionare->surename = $request->last_name;
        $userQuestionare->email = $request->email;
        $userQuestionare->phone_number = $request->tel;
        $userQuestionare->gender = $request->gender;
        $userQuestionare->date_of_birth = $request->birthday;
        $userQuestionare->height = $request->height;
        $userQuestionare->weight = $request->weight;
        $userQuestionare->job_title = $request->job_desc;
        $userQuestionare->job_activity_level = $request->activity_level;
        $userQuestionare->working_schedule = $request->regular_schedule;
        $userQuestionare->travel_often = $request->travel_level;
        $userQuestionare->list_of_physical_activities = $request->physical_activity_list;
        $userQuestionare->diagnosed_heallth_problems = $request->diagnosed_health_problems;
        $userQuestionare->medications = $request->health_medications;
        $userQuestionare->additional_therapies = $request->additional_health_therapy;
        $userQuestionare->injuries_list = $request->all_injuries;
        $userQuestionare->additional_therapies_injury = $request->additional_injury_therapy;
        $userQuestionare->stress_motivational_problems = $request->stres_problems;
        $userQuestionare->family_heart_disease = $request->heart_yes_no;
        $userQuestionare->family_heart_disease_list = $request->heart_list;
        $userQuestionare->current_cigarete_smoker = $request->ciggarete;
        if($request->diet_1 == "on"){
            $userQuestionare->current_diet_1 = true;
        }
        if($request->diet_2 == "on"){
            $userQuestionare->current_diet_2 = true;
        }
        if($request->diet_3 == "on"){
            $userQuestionare->current_diet_3 = true;
        }
        if($request->diet_4 == "on"){
            $userQuestionare->current_diet_4 = true;
        }
        if($request->diet_5 == "on"){
            $userQuestionare->current_diet_5 = true;
        }
        $userQuestionare->readiness_for_change = $request->readiness;
        if($request->goals_1 == "on"){
            $userQuestionare->goals_1 = true;
        }
        if($request->goals_2 == "on"){
            $userQuestionare->goals_2 = true;
        }
        if($request->goals_3 == "on"){
            $userQuestionare->goals_3 = true;
        }
        if($request->goals_4 == "on"){
            $userQuestionare->goals_4 = true;
        }
        if($request->goals_5 == "on"){
            $userQuestionare->goals_5 = true;
        }
        $userQuestionare->goal_for_training = $request->your_goal;
        $userQuestionare->why_goal_for_training = $request->why;
        $userQuestionare->timeline_for_achieing = $request->timeline;
        $userQuestionare->how_often_wiling_per_week = $request->how_often;
        $userQuestionare->rate_motivational_level = $request->motivational;
        $userQuestionare->currently_exercising_regulary = $request->exercise_regulary;
        $userQuestionare->personal_trainer_before = $request->personal_trainer;
        $userQuestionare->what_kind_of_training = $request->kind_of_training;
        if($request->what_times_1 == "on"){
            $userQuestionare->what_times_1 = true;    
        }
        if($request->what_times_2 == "on"){
            $userQuestionare->what_times_2 = true;    
        }
        if($request->what_times_3 == "on"){
            $userQuestionare->what_times_3 = true;    
        }
        if($request->what_times_4 == "on"){
            $userQuestionare->what_times_4 = true;    
        }
        $userQuestionare->your_expectations = $request->expectations_of_trainer;

        if($userQuestionare->save()){
            return redirect()->back()->with('sucess', 'You have succesfully updated your questionare');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }
       

    }

    public function selectSubscriptionType(){

        $subscriptionTypes = SubscriptionType::all();

        return view('user.selectsubtype')->with(['subscriptionTypes'=>$subscriptionTypes]);
    }

    public function updateSubscriptionType(Request $request){
        $user = Auth::user();
        $user->subscription_type = $request->sub_select;
        $user->save();

        return \redirect('/dashboard');
    }
}
