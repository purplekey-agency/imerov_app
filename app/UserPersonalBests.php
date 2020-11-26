<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPersonalBests extends Model
{
    /** 
     * The table associated with the model
     * 
     * @var string
     * 
    */
    protected $table = 'user_personal_bests';

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','date','weight','height','bodyfat',
        'imagepath','neck','hips','chest','thigh',
        'bicep','calf', 'waist'
    ];
}
