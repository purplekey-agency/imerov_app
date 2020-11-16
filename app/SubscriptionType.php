<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{

    /** 
     * The table associated with the model
     * 
     * @var string
     * 
    */
    protected $table = 'subscription_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subscription_type', 'subscription_price', 'subscription_description'
    ];
}
