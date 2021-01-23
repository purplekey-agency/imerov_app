<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposedMeet extends Model
{
    /** 
     * The table associated with the model
     * 
     * @var string
     * 
    */
    protected $table = 'proposed_meets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'proposed_date', 'proposed_time', 'confirmed'
    ];
}
