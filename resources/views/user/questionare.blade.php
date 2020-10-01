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
                    
                    <form action="" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="first_name" class="strong required">Full name</label>

                            <div class="row w-100 justify-content-between mx-0">
                                <input type="text" class="form-control w-40" id="first_name" name="first_name" required placeholder="First name">
                        
                                <input type="text" class="form-control w-40" id="last_name" name="last_name" required placeholder="Last name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="strong required">Your email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="strong">Phone number</label>
                            <input type="number" class="form-control" id="tel" name="tel" >
                        </div>

                        <div class="form-group">
                            <label for="height" class="strong">Height</label>
                            <input type="number" class="form-control" id="height" name="height" >
                        </div>

                        <div class="form-group">
                            <label for="weight" class="strong">Weight</label>
                            <input type="number" class="form-control" id="weight" name="weight" >
                        </div>

                        <div class="form-group">
                            <label for="job_desc" class="strong">What do you do for a living?</label>
                            <input type="text" class="form-control" id="job_desc" name="job_desc" >
                        </div>

                        <div class="form-group">
                            <label class="strong">What is your activity level at your job?</label>
                            <div class="form-check">
                                <input type="radio" id="activity_level_1" name="activity_level" class="form-check-input"><label for="activity_level_1">none (seated only)</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="activity_level_2" name="activity_level" class="form-check-input"><label for="activity_level_2">Moderate (light actiity such as walking)</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="activity_level_3" name="activity_level" class="form-check-input"><label for="activity_level_3">none (seated only)</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="regular_schedule" class="strong">Do you follow a regular working schedule, do you work days, afternoon or nights?</label>
                            <input type="text" class="form-control" id="regular_schedule" name="regular_schedule">
                        </div>

                        <div class="form-group">
                            <label class="strong">How ofter do you travel?</label>
                            <div class="form-check">
                                <input type="radio" id="travel_level_1" name="travel_level" class="form-check-input"><label for="travel_level_1">Rarely</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="travel_level_2" name="travel_level" class="form-check-input"><label for="travel_level_2">A few times a year</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="travel_level_3" name="travel_level" class="form-check-input"><label for="travel_level_3">A few times a month</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="physical_activity_list" class="strong">Please list the physical activities that you participate in outside of the gym and outside of work:</label>
                            <input type="text" class="form-control" id="physical_activity_list" name="physical_activity_list">
                        </div>

                        <div class="form-group">
                            <label for="diagnosed_health_problems" class="strong">If you have any diagnosed health problems list the condition(s).</label>
                            <input type="text" class="form-control" id="diagnosed_health_problems" name="diagnosed_health_problems">
                        </div>

                        <div class="form-group">
                            <label for="health_medications" class="strong">If you are on any medications, please list them.</label>
                            <input type="text" class="form-control" id="health_medications" name="health_medications">
                        </div>

                        <div class="form-group">
                            <label for="additional_health_therapy" class="strong">What additional therapies are being undertaken for the given health problem(s)?</label>
                            <input type="text" class="form-control" id="additional_health_therapy" name="additional_health_therapy">
                        </div>

                        <div class="form-group">
                            <label for="all_injuries" class="strong">If you have any injuries, please list them.</label>
                            <input type="text" class="form-control" id="all_injuries" name="all_injuries">
                        </div>

                        <div class="form-group">
                            <label for="additional_injury_therapy" class="strong">What additional therapies are being undertaken for the given injury?</label>
                            <input type="text" class="form-control" id="additional_injury_therapy" name="additional_injury_therapy">
                        </div>

                        
                        <div class="form-group">
                            <label class="strong">Are you experiencing any stresses or motivational problems?</label>
                            <div class="form-check">
                                <input type="radio" id="stress_1" name="stres_problems" class="form-check-input"><label for="stress_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="stress_2" name="stres_problems" class="form-check-input"><label for="stress_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Has anyone of your immediate family developed heart disease before the age of 60?</label>
                            <div class="form-check">
                                <input type="radio" id="heart_1" name="heart_yes_no" class="form-check-input"><label for="heart_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="heart_2" name="heart_yes_no" class="form-check-input"><label for="heart_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="heart_list" class="strong">If yes, please list:</label>
                            <input type="text" class="form-control" id="heart_list" name="heart_list">
                        </div>

                        <div class="form-group">
                            <label class="strong">Are you a current cigarette smoker?</label>
                            <div class="form-check">
                                <input type="radio" id="ciggarete_1" name="ciggarete" class="form-check-input"><label for="ciggarete_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="ciggarete_1" name="ciggarete" class="form-check-input"><label for="ciggarete_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Your current diet could be best characterized as:</label>
                            <div class="form-check">
                                <input type="checkbox" id="diet_1" name="diet_1" class="form-check-input"><label for="diet_1">low-fat</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="diet_2" name="diet_2" class="form-check-input"><label for="diet_2">low-carb</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="diet_3" name="diet_3" class="form-check-input"><label for="diet_3">high-protein</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="diet_4" name="diet_4" class="form-check-input"><label for="diet_4">Vegeterian/Vegan</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="diet_5" name="diet_5" class="form-check-input"><label for="diet_5">No special diet</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Please rate your readiness for change.</label>
                            <div class="form-check">
                                <input type="radio" id="readiness_1" name="readiness" class="form-check-input"><label for="readiness_1">1</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="readiness_2" name="readiness" class="form-check-input"><label for="readiness_2">2</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="readiness_3" name="readiness" class="form-check-input"><label for="readiness_3">3</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="readiness_4" name="readiness" class="form-check-input"><label for="readiness_4">4</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="readiness_5" name="readiness" class="form-check-input"><label for="readiness_5">5</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="readiness_6" name="readiness" class="form-check-input"><label for="readiness_6">6</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="readiness_7" name="readiness" class="form-check-input"><label for="readiness_7">7</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="readiness_8" name="readiness" class="form-check-input"><label for="readiness_8">8</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="readiness_9" name="readiness" class="form-check-input"><label for="readiness_9">9</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="readiness_10" name="readiness" class="form-check-input"><label for="readiness_10">10</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">What following goals does best fit in with your goals?</label>
                            <div class="form-check">
                                <input type="checkbox" id="goals_1" name="goals_1" class="form-check-input"><label for="goals_1">Improved health</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="goals_2" name="goals_2" class="form-check-input"><label for="goals_2">Improved endurance</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="goals_3" name="goals_3" class="form-check-input"><label for="goals_3">Increased strength</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="goals_4" name="goals_4" class="form-check-input"><label for="goals_4">Increased muscle mass</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="goals_5" name="goals_5" class="form-check-input"><label for="goals_5">Fat loss</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="your_goal" class="strong">What is your goal with your training?</label>
                            <input type="text" class="form-control" id="your_goal" name="your_goal">
                        </div>

                        <div class="form-group">
                            <label for="why" class="strong">Why?</label>
                            <input type="text" class="form-control" id="why" name="why">
                        </div>

                        <div class="form-group">
                            <label class="strong">Timeline for achieving your goal.</label>
                            <div class="form-check">
                                <input type="radio" id="timeline_1" name="timeline" class="form-check-input"><label for="timeline_1">8 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="timeline_2" name="timeline" class="form-check-input"><label for="timeline_2">16 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="timeline_3" name="timeline" class="form-check-input"><label for="timeline_3">24 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="timeline_4" name="timeline" class="form-check-input"><label for="timeline_4">32 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="timeline_5" name="timeline" class="form-check-input"><label for="timeline_5">40 WKS X</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="timeline_6" name="timeline" class="form-check-input"><label for="timeline_6">1 YEAR</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="how_often" class="strong">How often are you willing to train a week to reach your goal?</label>
                            <input type="text" class="form-control" id="how_often" name="how_often">
                        </div>

                        <div class="form-group">
                            <label class="strong">Please rate your motivational level to do what it takes for reaching your goal.</label>
                            <div class="form-check">
                                <input type="radio" id="motivational_1" name="motivational" class="form-check-input"><label for="motivational_1">1</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="motivational_2" name="motivational" class="form-check-input"><label for="motivational_2">2</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="motivational_3" name="motivational" class="form-check-input"><label for="motivational_3">3</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="motivational_4" name="motivational" class="form-check-input"><label for="motivational_4">4</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="motivational_5" name="motivational" class="form-check-input"><label for="motivational_5">5</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="motivational_6" name="motivational" class="form-check-input"><label for="motivational_6">6</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="motivational_7" name="motivational" class="form-check-input"><label for="motivational_7">7</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="motivational_8" name="motivational" class="form-check-input"><label for="motivational_8">8</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="motivational_9" name="motivational" class="form-check-input"><label for="motivational_9">9</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="motivational_10" name="motivational" class="form-check-input"><label for="motivational_10">10</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Are you currently exersising regulary (at least 3x per week)?</label>
                            <div class="form-check">
                                <input type="radio" id="exercise_regulary_1" name="exercise_regulary" class="form-check-input"><label for="exercise_regulary_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="exercise_regulary_2" name="exercise_regulary" class="form-check-input"><label for="exercise_regulary_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="strong">Have you trained with a personal trainer before?</label>
                            <div class="form-check">
                                <input type="radio" id="personal_trainer_1" name="personal_trainer" class="form-check-input"><label for="personal_trainer_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="personal_trainer_1" name="personal_trainer" class="form-check-input"><label for="personal_trainer_2">No</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kind_of_training" class="strong">If yes, what kind of training did you do:</label>
                            <input type="text" class="form-control" id="kind_of_training" name="kind_of_training">
                        </div>

                        <div class="form-group">
                            <label class="strong">At what times during the day would you prefer to train?</label>
                            <div class="form-check">
                                <input type="checkbox" id="what_times_1" name="what_times" class="form-check-input"><label for="what_times_1">Morning</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="what_times_2" name="what_times" class="form-check-input"><label for="what_times_2">Mid-Day</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="what_times_3" name="what_times" class="form-check-input"><label for="what_times_3">Afternoon</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="what_times_4" name="what_times" class="form-check-input"><label for="what_times_4">Evening</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="expectations_of_trainer" class="strong">What are your expectations on me as your Personal Trainer?</label>
                            <input type="textarea" class="form-control" id="expectations_of_trainer" name="expectations_of_trainer">
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


