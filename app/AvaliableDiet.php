<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvaliableDiet extends Model
{
    /** 
     * The table associated with the model
     * 
     * @var string
     * 
    */
    protected $table = 'user_avaliable_diet';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'avaliable_food_type', 'avaliable_food_name'
    ];
}
