<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestionare extends Model
{

    /** 
     * The table associated with the model
     * 
     * @var string
     * 
    */
    protected $table = 'userquestionare';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name', 'surename', 'email', 'phone_number', 'gender','date_of_birth', 'height',
        'weight','job_title','job_activity_level', 'working_schedule', 'travel_often',
        'list_of_physical_activities','diagnosed_health_problems','medications','additional_therapies',
        'injuries_list','additional_therapies_injury','stress_motivational_problems','family_heart_disease',
        'current_cigarete_smoker','current_diet','readiness_for_change','best_fit_goals',
        'goal_fot_training','why_goal_for_training','timeline_for_achieing','how_often_wiling_per_week',
        'rate_motivational_level','currently_exercising_regulary','personal_trainer_before',
        'what_kind_of_training','at_what_times_prefer_training','your_expectations'
    ];
}
