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
   protected $table = 'user_worksheet';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','video_id','date','muscle_group','start','finish','video_id','reps_1','weight_1','reps_2','weight_2','reps_3','weight_3','reps_4','weight_4','reps_5','weight_5','reps_6','weight_6'
    ];

    public function getVideo(){
        if($this->video_id !== null){
            $video = UserVideos::find($this->video_id);
            if($video){
                return $video->name;
            }
        }
        return null;       
    }
}
