<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDietPlan extends Model
{
    /**
    * The table associated with the model
    * 
    * @var string
    * 
   */
   protected $table = 'user_diet_plan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','date','meal_no',
        'meal_type_1', 'meal_weight_1',
        'meal_type_2', 'meal_weight_2',
        'meal_type_3', 'meal_weight_3',
        'meal_type_4', 'meal_weight_4',
        'meal_type_5', 'meal_weight_5',
    ];
}
