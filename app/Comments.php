<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /** 
     * The table associated with the model
     * 
     * @var string
     * 
    */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id', 'receipent_id', 'type', 'message_content', 'status'
    ];

}
