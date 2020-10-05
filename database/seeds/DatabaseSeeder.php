<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);


        //users

        DB::table('users')->insert([

            'name'=>'Eren',
            'surename'=>'Yeager',
            'username'=>'eyeager',
            'subscription_type'=>0,
            'user_image_1'=>'default_user_image',
            'user_image_2'=>'default_user_image',
            'type_of_user'=>2,
            'email'=>'eyeager@gmail.com',
            'password'=>Crypt::encrypt('Lambda12'),

        ]);
    }
}
