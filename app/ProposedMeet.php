<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

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
        'user_id', 'proposed_date', 'proposed_time', 'confirmed', 'done'
    ];


    public function getUserName(){
        $user = User::where('id', $this->user_id)->first();
        return $user->name . " " . $user->surename;
    }

    public function getSubName(){
        $user = User::where('id', $this->user_id)->first();
        $subtype = SubscriptionType::where('id', $user->subscription_type)->first();
        if($subtype === null){
            return 'No Subscription selected';
        }
        return $subtype->subscription_type;
        

    }
}
