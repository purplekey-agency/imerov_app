<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserQuestionare;
use App\UserVideos;
use App\Library;
use App\SubscriptionType;
use App\UserWorksheet;

class AdminViewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAdminDashboard(){
        $inactiveusers = count(User::where('type_of_user', 0)->where('subscription_type', 0)->get());
        $activeusers = count(User::where('type_of_user', 0)->whereIn('subscription_type', [1,2,3,4,5])->get());

        return view('admin.dashboard')->with(['inactiveusers'=>$inactiveusers, 'activeusers'=>$activeusers]);
    }

    public function showUsersPage(){

        $users = User::where('type_of_user', 0)->where('subscription_type','>',0)->get();
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
        $users = User::where('type_of_user', 0)->where('subscription_type','>',0)->get();
        $videos = Library::all();
        return view('admin.upload')->with(['users'=>$users, 'videos'=>$videos]);
    }

    public function showAdminVideosPage(){

        $exerciseLibrary = Library::all();

        return view('admin.videos')->with(['exerciseLibrary'=>$exerciseLibrary]);
    }

    public function showSingleVideo($id){

        $exercise = Library::where('id', $id)->first();

        return view('admin.video')->with(['exercise'=>$exercise]);
    }

    public function showAddNewExercisePage(){

        $subtypes = SubscriptionType::all();
        return view('admin.addvideo')->with(['subtypes'=>$subtypes]);
    }

    public function addNewExercise(Request $request){

        #dd($request);

        $exercise = new Library();
        $exercise->exercise_name = $request->exercise_name;
        $exercise->exercise_description = $request->exercise_description;
        $exercise_video_m = "exercise_video_m_default";
        $exercise_video_f = "exercise_video_f_default";

        if($request->subtype_1 !==null){
            $exercise->subtype_1 = true;
        }
        if($request->subtype_2 !==null){
            $exercise->subtype_2 = true;
        }
        if($request->subtype_3 !==null){
            $exercise->subtype_3 = true;
        }
        if($request->subtype_4 !==null){
            $exercise->subtype_4 = true;
        }
        if($request->subtype_5 !==null){
            $exercise->subtype_5 = true;
        }

        if($request->exercise_video_m !== null){
            $filenameWithExt = $request->file('exercise_video_m')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('exercise_video_m')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('exercise_video_m')->storeAs('public/videos',$fileNameToStore);
        }

        $exercise->video_path_m = $fileNameToStore;

        if($request->exercise_video_f !== null){
            $filenameWithExt = $request->file('exercise_video_f')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('exercise_video_f')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('exercise_video_f')->storeAs('public/videos',$fileNameToStore);
        }

        $exercise->video_path_f = $fileNameToStore;

        try{
            $exercise->save();
            return \redirect()->back()->with('success', 'You have succesfully uploaded the exercise.');
        }
        catch(\Exception $e){
            return \redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }

        
    }

    public function searchFunction(Request $request){
        dd($request->all());
    }

    public function updateSpreadsheet(Request $request){
        dd($request->all());

        $user = $request->userid;

        for($i=0; $i<6; $i++){

            if(!isset($request->{"date_" . $i . "_" . $user->id})){
                dd("You haven't selected date.");
            }
            if(!isset($request->{"start_" . $i . "_" . $user->id})){
                dd("You haven't selected starting time.");
            }
            if(!isset($request->{"finish_" . $i . "_" . $user->id})){
                dd("You haven't selected ending time.");
            }

            for($j=0; $j<6; $j++){
                if(isset($request->{"video_" . $i . "_" . $j})){

                    $worksheet = new UserWorksheet();
                    if(!isset($request->{"strech_" . $i . "_" . $user->id})){
                        
                    }
                    else{

                    }

                    if(!isset($request->{"warm_" . $i . "_" . $user->id})){
                        
                    }
                    else{
                        
                    }
                    
                    $worksheet->video_id = $request->{"video_" . $i . "_" . $j};
                    $worksheet->date = $request->{"date_" . $i . "_" . $user->id};
                    $worksheet->muscle_group = $request->{"date_" . $i . "_" . $user->id};

                }
            }
        }
    }

    public function updateDietPlan(Request $request){
        dd($request->all());
    }
}
