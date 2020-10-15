<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorksheet extends Model
{
    /**
    * The table associated with the model
    * 
    * @var string
    * 
   */
   protected $table = 'userworksheet';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','date','muscle_group','start','finish','video_id','reps_1','weight_1',
    ];
}
