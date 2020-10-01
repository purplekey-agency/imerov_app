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
        'user_id','date','weight','height','bodyfat','neck','hips','chest','thign','bicep_flexed','calf',
        'waist','etc','etc','etc'
    ];
}
