<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserQuestionare;
use App\UserVideos;
use App\Library;
use App\SubscriptionType;
use App\UserWorksheet;
use App\UserDietPlan;
use App\Comments;
use App\Message;
use App\UserPersonalBests;
use Auth;

class AdminViewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAdminDashboard(){
        $inactiveusers = count(User::where('type_of_user', 0)->where('subscription_type', 0)->get());
        $activeusers = count(User::where('type_of_user', 0)->whereIn('subscription_type', [1,2,3,4,5])->get());

        $newMessages = Comments::where('receipent_id', Auth::user()->id)->where('status', false)->get();
        $allMessages = Comments::where('receipent_id', Auth::user()->id)->where('status', true)->get();

        return view('admin.dashboard')->with(['inactiveusers'=>$inactiveusers, 'activeusers'=>$activeusers, 'newMessages'=>$newMessages, 'allMessages'=>$allMessages]);
    }

    public function showUsersPage(){

        $users = User::where('type_of_user', 0)->where('subscription_type','>',0)->get();
        return view('admin.users')->with(['users'=>$users]);

    }

    public function showUserPage($id){

        $user = User::where('id', $id)->first();
        $birthday = UserQuestionare::where('user_id', $id)->first();
        $birthday = $birthday->date_of_birth;

        $newMessages = Comments::where('receipent_id', $id)->where('status', false)->get();
        $allMessages = Comments::where('receipent_id', $id)->where('status', true)->get();

        $userPersonalBests1 = UserPersonalBests::where('user_id', $id)->first();
        $userPersonalBests2 = UserPersonalBests::where('user_id', $id)->orderBy('id', 'desc')->first();

        if($userPersonalBests1 !== null && $userPersonalBests2 !== null){
            if($userPersonalBests1->imagepath === $userPersonalBests2->imagepath){
                $userPersonalBests2 = null;
            }
        }

        return view('admin.user.dashboard')->with(['user'=>$user, 'birthday'=>$birthday, 'newMessages'=>$newMessages, 'allMessages'=>$allMessages, 'userPersonalBests1'=>$userPersonalBests1, 'userPersonalBests2'=>$userPersonalBests2]);
    }

    public function showUserQuestionarePage($id){
        $user = User::where('id', $id)->first();
        $userQuestionare = UserQuestionare::where('user_id', $user->id)->first();
        $messages = Message::where('user_channel', $user->id)->where('category', 1)->get();
        return view('admin.user.questionare')->with([
            'user' => $user, 
            'userQuestionare' => $userQuestionare,
            'messages' => $messages
        ]);
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
        if(request()->search){
            $filtered = Message::where('message', 'like', '%'.request()->search.'%')->get();
        } else {
            // $comments = Comments::where('receipent_id', Auth::user()->id)->get();
            $categories = [1,2,3,4];

            $filtered = collect();
            $users = User::where('type_of_user', '!=', '2')->get();
            $msg_count = Message::all()->count();

            if($msg_count > 0){
                foreach($categories as $category){
                    foreach($users as $user){
                        $message = Message::where('category', $category)->where('user_channel', $user->id)->orderBy('created_at', 'desc')->get()->first();
                        if($message){
                            $filtered->push($message);
                        }
                    }
                }
    
                if($msg_count > 1){
                    $filtered = $filtered->sort(function ($a, $b){
                        if ($a->total === $b->total) {
                            return strtotime($a->created_at) < strtotime($b->created_at);
                        }
                        
                        return $a->total < $b->total;
                    });
                }
            }

        }

        return view('admin.messages')->with(['messages'=>$filtered]);
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
        #dd($request->all());
        $errors = [];

        $user = User::where('id', $request->userid)->first();

        for($i=0; $i<6; $i++){

            for($j=0; $j<6; $j++){
                if(isset($request->{"video_" . $i . "_" . $j})){

                    if(!isset($request->{"date_" . $i . "_" . $user->id})){
                        #dd("You haven't selected date.", $request->{"date_" . $i . "_" . $user->id}, $i);
                        return redirect()->back()->with('error', "You haven't selected date.");
                    }
                    if(!isset($request->{"start_" . $i . "_" . $user->id})){
                        #dd("You haven't selected starting time.", $request->{"start_" . $i . "_" . $user->id}, $i);
                        return redirect()->back()->with('error', "You haven't selected starting time.");
                    }
                    if(!isset($request->{"finish_" . $i . "_" . $user->id})){
                        return redirect()->back()->with('error', "You haven't selected ending time.");
                    }

                    $worksheet = new UserWorksheet();                  
                    $worksheet->video_id = $request->{"video_" . $i . "_" . $j};
                    $worksheet->user_id = $user->id;
                    $worksheet->date = $request->{"date_" . $i . "_" . $user->id};
                    $worksheet->muscle_group = $request->{"muscle_group_" . $i . "_" . $user->id};
                    $worksheet->start = "Test";
                    $worksheet->finish= "Test";

                    if(isset($request->{"reps_set_" . $i . "_" . $j . "_0"}) && isset($request->{"weight_set_" . $i . "_" . $j . "_0"})){
                        $worksheet->reps_1 = $request->{"reps_set_" . $i . "_" . $j . "_0"};
                        $worksheet->weight_1 = $request->{"reps_set_" . $i . "_" . $j . "_0"};
                    }
                    if(isset($request->{"reps_set_" . $i . "_" . $j . "_1"}) && isset($request->{"weight_set_" . $i . "_" . $j . "_1"})){
                        $worksheet->reps_2 = $request->{"reps_set_" . $i . "_" . $j . "_1"};
                        $worksheet->weight_2 = $request->{"reps_set_" . $i . "_" . $j . "_1"};
                    }
                    if(isset($request->{"reps_set_" . $i . "_" . $j . "_2"}) && isset($request->{"weight_set_" . $i . "_" . $j . "_2"})){
                        $worksheet->reps_3 = $request->{"reps_set_" . $i . "_" . $j . "_2"};
                        $worksheet->weight_3 = $request->{"reps_set_" . $i . "_" . $j . "_2"};
                    }
                    if(isset($request->{"reps_set_" . $i . "_" . $j . "_3"}) && isset($request->{"weight_set_" . $i . "_" . $j . "_3"})){
                        $worksheet->reps_4 = $request->{"reps_set_" . $i . "_" . $j . "_3"};
                        $worksheet->weight_4 = $request->{"reps_set_" . $i . "_" . $j . "_3"};
                    }
                    if(isset($request->{"reps_set_" . $i . "_" . $j . "_4"}) && isset($request->{"weight_set_" . $i . "_" . $j . "_4"})){
                        $worksheet->reps_5 = $request->{"reps_set_" . $i . "_" . $j . "_4"};
                        $worksheet->weight_5 = $request->{"reps_set_" . $i . "_" . $j . "_4"};
                    }
                    if(isset($request->{"reps_set_" . $i . "_" . $j . "_5"}) && isset($request->{"weight_set_" . $i . "_" . $j . "_5"})){
                        $worksheet->reps_6 = $request->{"reps_set_" . $i . "_" . $j . "_5"};
                        $worksheet->weight_6 = $request->{"reps_set_" . $i . "_" . $j . "_5"};
                    }
                    
                    try{
                        $worksheet->save();
                    }
                    catch(\Exception $e){
                        return redirect()->back()->with('error', $e->getMessage());
                    }

                }
            }
        }

        return redirect()->back()->with('success', 'You have succesfully updated the user\'s worksheet.');
    }

    public function updateDietPlan(Request $request){
        #dd($request->all());

        $user = User::where('id', $request->userid)->first();

        for($i=1; $i<=5; $i++){
            if(isset($request->{'date_' . $i})){
                $date = $request->{'date_' . $i};

                for($j = 1; $j<=5; $j++){

                    if(isset($request->{"meal_type_".$i."_".$j."_1"}) && isset($request->{"meal_".$i."_".$j."_1"})){
                        $userDietPlan = new UserDietPlan();
                        $userDietPlan->user_id = $user->id;
                        $userDietPlan->date = $date;
                        $userDietPlan->meal_no = $j;
    
                        $userDietPlan->meal_type_1 = $request->{"meal_type_".$i."_".$j."_1"};
                        $userDietPlan->meal_weight_1 = $request->{"meal_".$i."_".$j."_1"};
                        $userDietPlan->meal_type_2 = $request->{"meal_type_".$i."_".$j."_2"};
                        $userDietPlan->meal_weight_2 = $request->{"meal_".$i."_".$j."_2"};
                        $userDietPlan->meal_type_3 = $request->{"meal_type_".$i."_".$i."_3"};
                        $userDietPlan->meal_weight_3 = $request->{"meal_".$i."_".$j."_3"};
                        $userDietPlan->meal_type_4 = $request->{"meal_type_".$i."_".$j."_4"};
                        $userDietPlan->meal_weight_4 = $request->{"meal_".$i."_".$j."_4"};
                        $userDietPlan->meal_type_5 = $request->{"meal_type_".$i."_".$j."_5"};
                        $userDietPlan->meal_weight_5 = $request->{"meal_".$i."_".$j."_5"};
    
                        $userDietPlan->save();
                    }


                }

            }
        }


        return redirect()->back()->with('success', 'You have successfully updated user diet plan.');
    }
}
