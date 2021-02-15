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
        'name', 'surename', 'username', 'email', 'password', 'subscription_type','user_image_1', 'user_image_2', 'worksheet', 'diet_plan', 'subscription_subtype'
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

    public function getSubSubtype(){
        if($this->subscription_subtype !== null){
            $subtype = SubscriptionSubtype::find($this->subscription_subtype);
            if($subtype){
                return "(" . $subtype->subtype . ")";
            }
        }
    }

    public function getMessageCount(){
        if($this->type_of_user === 2){
            return Message::where('user_id', '<>', $this->id)->count();
        } else {
            return Message::where('user_channel', $this->id)->where('user_id', '<>', $this->id)->get()->count();
        }
    }

    public function hasAccessToDietPlan(){

        //Online mentoring, Nutrition
        if($this->subscription_type === 1 || $this->subscription_type === 3){
            return true;
        }

        return false;

    }

    public function hasAccessToTraining(){
        //Online mentoring, Muscle Group, Senior program, GVT

        if($this->subscription_type === 1 || $this->subscription_type === 4 || $this->subscription_type === 4 || $this->subscription_type === 5 || $this->subscription_type === 6 || $this->subscription_type === 7){
            return true;
        }

        return false;

    }
}
