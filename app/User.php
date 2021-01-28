<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\SubscriptionType;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surename', 'username', 'email', 'password', 'subscription_type','user_image_1', 'user_image_2', 'worksheet', 'diet_plan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','type_of_user',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getSubName($id){
        if($id !== 0){
            $subtype = SubscriptionType::where('id', $id)->first();
            return $subtype->subscription_type;
        }
        else{
            return "No subscription selected.";
        }

    }

    public function getMessageCount(){
        if($this->type_of_user === 2){
            return Message::where('user_id', '<>', $this->id)->count();
        } else {
            return Message::where('user_channel', $this->id)->where('user_id', '<>', $this->id)->get()->count();
        }
    }
}
