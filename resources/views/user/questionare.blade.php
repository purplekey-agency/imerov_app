<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')

    <main>

        <div class="w-100 p-3 d-flex justify-content-center" style="background:rgba(123,123,123, 0.11);">
            <div class="app-container">
                
                <div class="title-container">
                    <h1 class="text-uppercase font-weight-bold">Account</h1>
                </div>

            </div>
        </div>

        <div class="app-container">

            <div class="container row">

                <div class="col-4 col-md-offset-2">
                    <div class="hover-text">
                        <a href="/dashboard">
                            <p class="text-secondary">Dashboard</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/questionarre">
                            <p class="strong">Questionarre</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/worksheet">
                            <p class="text-secondary">Worksheet</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/diet-plan">
                            <p class="text-secondary">Diet Plan</p>
                        </a>
                    </div>

                    <div class="hover-text">
                        <a href="/videos">
                            <p class="text-secondary">Videos</p>
                        </a>
                    </div>
                </div>

                <div class="col-8 md-offset-2">
                    
                    @if(Session::has('sucess'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('sucess')}}
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                    @endif

                    <form action="/questionarre/update" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="first_name" class="strong required">Full name</label>

                            <div class="row w-100 justify-content-between mx-0">
                                <input type="text" class="form-control w-40" id="first_name" name="first_name" required placeholder="First name" value="{{$userQuestionare->name}}">
                        
                                <input type="text" class="form-control w-40" id="last_name" name="last_name" required placeholder="Last name" value="{{$userQuestionare->surename}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="strong required">Your email</label>
                            <input type="email" class="form-control" id="email" name="email" required value="{{$userQuestionare->email}}">
                        </div>

                        <div class="form-group">
                            <label for="phone" class="strong">Phone number</label>
                            <input type="text" class="form-control" id="tel" name="tel" value="{{$userQuestionare->phone_number}}">
                        </div>

                        <div class="form-group">
                            <label class="strong">What is your gender?</label>
                            <div class="form-check">
                                <input @if($userQuestionare->gender == "M") checked @endif value="M" type="radio" id="gender_1" name="gender" class="form-check-input"><label for="gender_1">Male</label>
                            </div>
                            <div class="form-check">
                                <input @if($userQuestionare->gender == "F") checked @endif value="F" type="radio" id="gender_2" name="gender" class="form-check-input"><label for="gender_2">Female</label>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="birthday" class="strong">Date of birth</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{$userQuestionare->date_of_birth}}">
                        </div>

                        <div class="form-group">
                            <label for="height" class="strong">Height</label>
                            <input type="number" class="form-control" id="height" name="height" value="{{$userQuestionare->height}}" >
                        </div>

                        <div class="form-group">
                            <label for="weight" class="strong">Weight</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="{{$userQuestionare->weight}}" >
                        </div>

                        <div class="form-group">
                            <label for="job_desc" class="strong">What do you do for a living?</label>
                            <input type="text" class="form-control" id="job_desc" name="job_desc" value="{{$userQuestionare->job_title}}" >
                        </div>

                        <div class="form-group">
                            <label class="strong">What is your activity level at your job?</label>
                            <div class="form-check">
                                <input value="1" @if($userQuestionare->job_activity_level == 1) checked @endif type="radio" id="activity_level_1" name="activity_level" class="form-check-input"><label for="activity_level_1">none (seated only)</label>
                            </div>
                            <div class="form-check">
                                <input value="2" @if($userQuestionare->job_activity_level == 2) checked @endif type="radio" id="activity_level_2" name="activity_level" class="form-check-input"><label for="activity_level_2">Moderate (light actiity such as walking)</label>
                            </div>
                            <div class="form-check">
                                <input value="3" @if($userQuestionare->job_activity_level == 3) checked @endif type="radio" id="activity_level_3" name="activity_level" class="form-check-input"><label for="activity_level_3">none (seated only)</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="regular_schedule" class="strong">Do you follow a regular working schedule, do you work days, afternoon or nights?</label>
                            <input type="text" value="{{$userQuestionare->working_schedule}}" class="form-control" id="regular_schedule" name="regular_schedule">
                        </div>

                        <div class="form-group">
                            <label class="strong">How ofter do you travel?</label>
                            <div class="form-check">
                                <input type="radio" value="1" @if($userQuestionare->travel_often == 1) checked @endif id="travel_level_1" name="travel_level" class="form-check-input"><label for="travel_level_1">Rarely</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="2" @if($userQuestionare->travel_often == 2) checked @endif id="travel_level_2" name="travel_level" class="form-check-input"><label for="travel_level_2">A few times a year</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="3" @if($userQuestionare->travel_often == 3) checked @endif id="travel_level_3" name="travel_level" class="form-check-input"><label for="travel_level_3">A few times a month</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="physical_activity_list" class="strong">Please list the physical activities that you participate in outside of the gym and outside of work:</label>
                            <input type="text" value="{{$userQuestionare->list_of_physical_activities}}" class="form-control" id="physical_activity_list" name="physical_activity_list">
                        </div>

                        <div class="form-group">
                            <label for="diagnosed_health_problems" class="strong">If you have any diagnosed health problems list the condition(s).</label>
                            <input type="text" value="{{$userQuestionare->diagnosed_heallth_problems}}" class="form-control" id="diagnosed_health_problems" name="diagnosed_health_problems">
                        </div>

                        <div class="form-group">
                            <label for="health_medications" class="strong">If you are on any medications, please list them.</label>
                            <input type="text" value="{{$userQuestionare->medications}}" class="form-control" id="health_medications" name="health_medications">
                        </div>

                        <div class="form-group">
                            <label for="additional_health_therapy" class="strong">What additional therapies are being undertaken for the given health problem(s)?</label>
                            <input type="text" value="{{$userQuestionare->additional_therapies}}" class="form-control" id="additional_health_therapy" name="additional_health_therapy">
                        </div>

                        <div class="form-group">
                            <label for="all_injuries" class="strong">If you have any injuries, please list them.</label>
                            <input type="text" value="{{$userQuestionare->injuries_list}}" class="form-control" id="all_injuries" name="all_injuries">
                        </div>

                        <div class="form-group">
                            <label for="additional_injury_therapy" class="strong">What additional therapies are being undertaken for the given injury?</label>
                            <input type="text" value="{{$userQuestionare->additional_therapies_injury}}" class="form-control" id="additional_injury_therapy" name="additional_injury_therapy">
                        </div>

                        <div class="form-group">
                            <label class="strong">Are you experiencing any stresses or motivational problems?</label>
                            <div class="form-check">
                                <input type="radio" value="1" @if($userQuestionare->stress_motivational_problems == 1) checked @endif id="stress_1" name="stres_problems" class="form-check-input"><label for="stress_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="2" @if($userQuestionare->stress_motivational_problems == 1) checked @endif id="stress_2" name="stres_problems" class="form-check-input"><label for="stress_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Has anyone of your immediate family developed heart disease before the age of 60?</label>
                            <div class="form-check">
                                <input type="radio" value="1" @if($userQuestionare->family_heart_disease == true) checked @endif id="heart_1" name="heart_yes_no" class="form-check-input"><label for="heart_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="0" @if($userQuestionare->family_heart_disease == false) checked @endif id="heart_2" name="heart_yes_no" class="form-check-input"><label for="heart_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="heart_list" class="strong">If yes, please list:</label>
                            <input type="text" value="{{$userQuestionare->family_heart_disease_list}}" class="form-control" id="heart_list" name="heart_list">
                        </div>

                        <div class="form-group">
                            <label class="strong">Are you a current cigarette smoker?</label>
                            <div class="form-check">
                                <input type="radio" value="1" @if($userQuestionare->current_cigarete_smoker == true) checked @endif id="ciggarete_1" name="ciggarete" class="form-check-input"><label for="ciggarete_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="0" @if($userQuestionare->current_cigarete_smoker == false) checked @endif id="ciggarete_1" name="ciggarete" class="form-check-input"><label for="ciggarete_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Your current diet could be best characterized as:</label>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->current_diet_1 == true) checked @endif id="diet_1" name="diet_1" class="form-check-input"><label for="diet_1">low-fat</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->current_diet_2 == true) checked @endif id="diet_2" name="diet_2" class="form-check-input"><label for="diet_2">low-carb</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->current_diet_3 == true) checked @endif id="diet_3" name="diet_3" class="form-check-input"><label for="diet_3">high-protein</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->current_diet_4 == true) checked @endif id="diet_4" name="diet_4" class="form-check-input"><label for="diet_4">Vegeterian/Vegan</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->current_diet_5 == true) checked @endif id="diet_5" name="diet_5" class="form-check-input"><label for="diet_5">No special diet</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Please rate your readiness for change.</label>
                            <div class="form-check">
                                <input type="radio" value="1" @if($userQuestionare->readiness_for_change == 1) checked @endif id="readiness_1" name="readiness" class="form-check-input"><label for="readiness_1">1</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="2" @if($userQuestionare->readiness_for_change == 2) checked @endif id="readiness_2" name="readiness" class="form-check-input"><label for="readiness_2">2</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="3" @if($userQuestionare->readiness_for_change == 3) checked @endif id="readiness_3" name="readiness" class="form-check-input"><label for="readiness_3">3</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="4" @if($userQuestionare->readiness_for_change == 4) checked @endif id="readiness_4" name="readiness" class="form-check-input"><label for="readiness_4">4</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="5" @if($userQuestionare->readiness_for_change == 5) checked @endif id="readiness_5" name="readiness" class="form-check-input"><label for="readiness_5">5</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="6" @if($userQuestionare->readiness_for_change == 6) checked @endif id="readiness_6" name="readiness" class="form-check-input"><label for="readiness_6">6</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="7" @if($userQuestionare->readiness_for_change == 7) checked @endif id="readiness_7" name="readiness" class="form-check-input"><label for="readiness_7">7</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="8" @if($userQuestionare->readiness_for_change == 8) checked @endif id="readiness_8" name="readiness" class="form-check-input"><label for="readiness_8">8</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="9" @if($userQuestionare->readiness_for_change == 9) checked @endif id="readiness_9" name="readiness" class="form-check-input"><label for="readiness_9">9</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="10" @if($userQuestionare->readiness_for_change == 10) checked @endif id="readiness_10" name="readiness" class="form-check-input"><label for="readiness_10">10</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">What following goals does best fit in with your goals?</label>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->goals_1) checked @endif id="goals_1" name="goals_1" class="form-check-input"><label for="goals_1">Improved health</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->goals_2) checked @endif id="goals_2" name="goals_2" class="form-check-input"><label for="goals_2">Improved endurance</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->goals_3) checked @endif id="goals_3" name="goals_3" class="form-check-input"><label for="goals_3">Increased strength</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->goals_4) checked @endif id="goals_4" name="goals_4" class="form-check-input"><label for="goals_4">Increased muscle mass</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->goals_5) checked @endif id="goals_5" name="goals_5" class="form-check-input"><label for="goals_5">Fat loss</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="your_goal" class="strong">What is your goal with your training?</label>
                            <input type="text" class="form-control" id="your_goal" name="your_goal" value="{{$userQuestionare->goal_for_training}}">
                        </div>

                        <div class="form-group">
                            <label for="why" class="strong">Why?</label>
                            <input type="text" class="form-control" id="why" name="why" value="{{$userQuestionare->why_goal_for_training}}">
                        </div>

                        <div class="form-group">
                            <label class="strong">Timeline for achieving your goal.</label>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->timeline_for_achieing == 8) checked @endif id="timeline_1" name="timeline" value="8" class="form-check-input"><label for="timeline_1">8 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->timeline_for_achieing == 16) checked @endif id="timeline_2" name="timeline" value="16" class="form-check-input"><label for="timeline_2">16 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->timeline_for_achieing == 24) checked @endif id="timeline_3" name="timeline" value="24" class="form-check-input"><label for="timeline_3">24 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->timeline_for_achieing == 32) checked @endif id="timeline_4" name="timeline" value="32" class="form-check-input"><label for="timeline_4">32 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->timeline_for_achieing == 40) checked @endif id="timeline_5" name="timeline" value="40" class="form-check-input"><label for="timeline_5">40 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->timeline_for_achieing == 54) checked @endif id="timeline_6" name="timeline" value="54" class="form-check-input"><label for="timeline_6">1 YEAR</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="how_often" class="strong">How often are you willing to train a week to reach your goal?</label>
                            <input type="text" class="form-control" id="how_often" name="how_often" value="{{$userQuestionare->how_often_wiling_per_week}}">
                        </div>

                        <div class="form-group">
                            <label class="strong">Please rate your motivational level to do what it takes for reaching your goal.</label>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 1) checked @endif id="motivational_1" value="1" name="motivational" class="form-check-input"><label for="motivational_1">1</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 2) checked @endif id="motivational_2" value="2" name="motivational" class="form-check-input"><label for="motivational_2">2</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 3) checked @endif id="motivational_3" value="3" name="motivational" class="form-check-input"><label for="motivational_3">3</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 4) checked @endif id="motivational_4" value="4" name="motivational" class="form-check-input"><label for="motivational_4">4</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 5) checked @endif id="motivational_5" value="5" name="motivational" class="form-check-input"><label for="motivational_5">5</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 6) checked @endif id="motivational_6" value="6" name="motivational" class="form-check-input"><label for="motivational_6">6</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 7) checked @endif id="motivational_7" value="7" name="motivational" class="form-check-input"><label for="motivational_7">7</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 8) checked @endif id="motivational_8" value="8" name="motivational" class="form-check-input"><label for="motivational_8">8</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 9) checked @endif id="motivational_9" value="9" name="motivational" class="form-check-input"><label for="motivational_9">9</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->rate_motivational_level == 10) checked @endif id="motivational_10" value="10" name="motivational" class="form-check-input"><label for="motivational_10">10</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Are you currently exersising regulary (at least 3x per week)?</label>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->currently_exercising_regulary == 1) checked @endif id="exercise_regulary_1" value="1" name="exercise_regulary" class="form-check-input"><label for="exercise_regulary_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->currently_exercising_regulary == 2) checked @endif id="exercise_regulary_2" value="2" name="exercise_regulary" class="form-check-input"><label for="exercise_regulary_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Have you trained with a personal trainer before?</label>
                            <div class="form-check">
                                <input type="radio" @if($userQuestionare->personal_trainer_before) checked @endif id="personal_trainer_1" value="1" name="personal_trainer" class="form-check-input"><label for="personal_trainer_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" @if(!$userQuestionare->personal_trainer_before) checked @endif id="personal_trainer_1" value="0" name="personal_trainer" class="form-check-input"><label for="personal_trainer_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kind_of_training" class="strong">If yes, what kind of training did you do:</label>
                            <input type="text" class="form-control" id="kind_of_training" name="kind_of_training" value="{{$userQuestionare->what_kind_of_training}}" >
                        </div>

                        <div class="form-group">
                            <label class="strong">At what times during the day would you prefer to train?</label>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->what_times_1) checked @endif id="what_times_1" name="what_times_1" class="form-check-input"><label for="what_times_1">Morning</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->what_times_2) checked @endif id="what_times_2" name="what_times_2" class="form-check-input"><label for="what_times_2">Mid-Day</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->what_times_3) checked @endif id="what_times_3" name="what_times_3" class="form-check-input"><label for="what_times_3">Afternoon</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" @if($userQuestionare->what_times_4) checked @endif id="what_times_4" name="what_times_4" class="form-check-input"><label for="what_times_4">Evening</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="expectations_of_trainer" class="strong">What are your expectations on me as your Personal Trainer?</label>
                            <input type="textarea" class="form-control" id="expectations_of_trainer" name="expectations_of_trainer" value="{{$userQuestionare->your_expectations}}">
                        </div>

                        <div class="form-group row justify-content-end">
                            <button type="submit" class="btn btn-transparent">SUBMIT</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </main>

</body>

</html>


