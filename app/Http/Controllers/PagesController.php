<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserQuestionare;
use App\SubscriptionType;
use App\Comments;
use App\UserDietPlan;
use App\UserPersonalBests;
use App\Library;
use App\ProposedMeet;
use App\AvaliableDiet;

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

        $userPersonalBests1 = UserPersonalBests::where('user_id', Auth::user()->id)->first();
        $userPersonalBests2 = UserPersonalBests::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        if($userPersonalBests1 !== null && $userPersonalBests2 !== null){
            if($userPersonalBests1->imagepath === $userPersonalBests2->imagepath){
                $userPersonalBests2 = null;
            }
        }


        return view('user.dashboard')->with(['userQuestionare'=>$userQuestionare, 'newMessages'=>$newMessages, 'allMessages'=>$allMessages, 'userPersonalBests1'=>$userPersonalBests1, 'userPersonalBests2'=>$userPersonalBests2]);
    }

    public function showMessagesPage(){
        $sentMessages = Comments::where('sender_id', Auth::user()->id)->get();
        $receivedMesseges = Comments::where('receipent_id', Auth::user()->id)->get();

        return view('user.messages')->with(['sentMessages'=>$sentMessages, 'receivedMesseges'=>$receivedMesseges]);
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

        $userDiets = UserDietPlan::where('user_id', $user->id)->get()->groupBy('day');

        $avaliableProtein = AvaliableDiet::where('user_id', $user->id)->where('avaliable_food_type', 1)->get();
        $avaliableVegetables = AvaliableDiet::where('user_id', $user->id)->where('avaliable_food_type', 2)->get();
        $avaliableFruits = AvaliableDiet::where('user_id', $user->id)->where('avaliable_food_type', 3)->get();
        $avaliableGrains = AvaliableDiet::where('user_id', $user->id)->where('avaliable_food_type', 4)->get();
        $avaliableHealtyFats = AvaliableDiet::where('user_id', $user->id)->where('avaliable_food_type', 5)->get();
        $avaliableDairyProducts = AvaliableDiet::where('user_id', $user->id)->where('avaliable_food_type', 6)->get();

        return view('user.dietplan')->with(['userDiets'=>$userDiets, 'userDiets'=>$userDiets, 'avaliableProtein'=>$avaliableProtein,
        'avaliableVegetables'=>$avaliableVegetables, 'avaliableFruits'=>$avaliableFruits, 'avaliableGrains'=>$avaliableGrains,
        'avaliableHealtyFats'=>$avaliableHealtyFats, 'avaliableDairyProducts'=>$avaliableDairyProducts]);
    }

    public function showDietPlanPageWithParam($id){
        $userDiet = UserDietPlan::where('day', $id)->where('user_id', Auth::user()->id)->get();
        #dd($userDiet);

        return view('user.todaydietplan')->with(['userDiet'=>$userDiet]);
    }

    public function showVideosPage(){

        $user = Auth::user();

        $allVideos = "";

        if($user->subscription_type == 1){
            $allVideos = Library::where('subtype_1', true)->get();
        }
        elseif($user->subscription_type == 2){
            $allVideos = Library::where('subtype_2', true)->get();
        }
        elseif($user->subscription_type == 3){
            $allVideos = Library::where('subtype_3', true)->get();
        }
        elseif($user->subscription_type == 4){
            $allVideos = Library::where('subtype_4', true)->get();
        }
        elseif($user->subscription_type == 5){
            $allVideos = Library::where('subtype_5', true)->get();
        }

        #dd($allVideos);

        return view('user.videos')->with(['allVideos'=>$allVideos]);
    }

    public function showVideoPage($parameter){

        $video = Library::where('id', $parameter)->first();
        return view('user.video')->with(['parameter'=>$parameter, 'video'=>$video]);
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


        if(isset($request->proposed_date_1) && isset($request->proposed_time_1)){
            $userID = Auth::user()->id;

            $proposedMeet = new ProposedMeet();

            $proposedMeet->user_id = $userID;
            $proposedMeet->proposed_date = $request->proposed_date_1;
            $proposedMeet->proposed_time = $request->proposed_time_1;
            $proposedMeet->save();

        }
        if(isset($request->proposed_date_2) && isset($request->proposed_time_2)){
            $userID = Auth::user()->id;

            $proposedMeet = new ProposedMeet();

            $proposedMeet->user_id = $userID;
            $proposedMeet->proposed_date = $request->proposed_date_2;
            $proposedMeet->proposed_time = $request->proposed_time_2;
            $proposedMeet->save();

        }
        if(isset($request->proposed_date_3) && isset($request->proposed_time_3)){
            $userID = Auth::user()->id;

            $proposedMeet = new ProposedMeet();

            $proposedMeet->user_id = $userID;
            $proposedMeet->proposed_date = $request->proposed_date_3;
            $proposedMeet->proposed_time = $request->proposed_time_3;
            $proposedMeet->save();
        }


        if($userQuestionare->save()){
            return redirect()->back()->with('sucess', 'You have succesfully updated your questionare');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }
       

    }

    public function updateBodyMeasurments(Request $request){
        #dd($request);

        $userPersonalBests = new UserPersonalBests();
        $userPersonalBests->user_id = Auth::user()->id;
        $userPersonalBests->date = \Carbon\Carbon::now();
        $userPersonalBests->weight = $request->weight;
        $userPersonalBests->height = $request->height;
        $userPersonalBests->bodyfat = $request->bodyfat;
        
        $userPersonalBests->neck = $request->neck;
        $userPersonalBests->hips = $request->hips;
        $userPersonalBests->chest = $request->chest;
        $userPersonalBests->thigh = $request->thigh;
        $userPersonalBests->bicep = $request->bicep;
        $userPersonalBests->calf = $request->calf;
        $userPersonalBests->waist = $request->waist;

        $fileNameToStore = "";
        $path = "";

        if($request->image){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/user_images',$fileNameToStore);
        }

        $userPersonalBests->imagepath = $fileNameToStore;
        if($userPersonalBests->save()){
            return redirect()->back()->with('success', 'You have succesfully updated your body beasurments');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
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
