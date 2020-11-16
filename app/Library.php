<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    /** 
     * The table associated with the model
     * 
     * @var string
     * 
    */
    protected $table = 'library';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exercise_name', 'video_path_m', 
        'video_path_f', 'exercise_description'
    ];
}
