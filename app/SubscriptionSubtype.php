<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionSubtype extends Model
{
    /** 
     * The table associated with the model
     * 
     * @var string
     * 
    */
    protected $table = 'subscription_subtypes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subscription_id', 'subtype'
    ];
}
