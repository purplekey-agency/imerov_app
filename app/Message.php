<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    private $categories = [
        1 => 'Questionare',
        2 => 'Body Measurements', // worksheet
        3 => 'Excercises', // worksheet
        4 => 'Diet Plan'
    ];


    /** 
     * The table associated with the model
     * 
     * @var string
     * 
    */
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'user_channel',
        'category', 
        'message', 
        'user_read',
        'admin_read'
    ];

    public function getUserName(){
        return User::find($this->user_id)->name;
    }

    public function getCategory(){
        return $this->categories[$this->category];
    }

    public function getDate(){
        return $this->created_at->format('d. m. Y H:i');
    }

    public function fromAdmin(){
        $user = User::find($this->user_id);
        if($user->type_of_user === 0) {
            return false;
        } else {
            return true;
        }
    }
}
