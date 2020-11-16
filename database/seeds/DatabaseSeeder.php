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

        DB::table('users')->insert([

            'name'=>'Annie',
            'surename'=>'Leonheart',
            'username'=>'anniel',
            'subscription_type'=>0,
            'user_image_1'=>'default_user_image',
            'user_image_2'=>'default_user_image',
            'type_of_user'=>0,
            'email'=>'anniel@gmail.com',
            'email_verified_at'=>\Carbon\Carbon::now(),
            'password'=>Crypt::encrypt('Lambda12'),

        ]);

        DB::table('user_questionare')->insert([

            'user_id'=>2,
            'name'=>'Annie',
            'surename'=>'Leonheart',
            'email'=>'anniel@gmail.com',
            'gender'=>'F',
            'date_of_birth'=>"24.11.1993",

        ]);

        DB::table('library')->insert([

            'exercise_name'=>'Flat Barbell Bench Press',
            'exercise_description'=>'default',

        ]);

        DB::table('library')->insert([

            'exercise_name'=>'Incline Dumbbell Bench Press',
            'exercise_description'=>'default',

        ]);

        DB::table('library')->insert([

            'exercise_name'=>'Machine Chest Fly',
            'exercise_description'=>'default',

        ]);

        DB::table('library')->insert([

            'exercise_name'=>'push-ups',
            'exercise_description'=>'default',

        ]);

        DB::table('library')->insert([

            'exercise_name'=>'ABS',
            'exercise_description'=>'default',

        ]);

        DB::table('library')->insert([

            'exercise_name'=>'CARDIO',
            'exercise_description'=>'default',

        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'SubTypeA',
            'subscription_price'=>'100',
            'subscription_description'=>'123'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'SubTypeB',
            'subscription_price'=>'80',
            'subscription_description'=>'abc'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'SubTypeC',
            'subscription_price'=>'60',
            'subscription_description'=>'cda'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'SubTypeD',
            'subscription_price'=>'40',
            'subscription_description'=>'xyz'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'SubTypeF',
            'subscription_price'=>'20',
            'subscription_description'=>'zyx'
        ]);
    }
}
