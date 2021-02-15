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

        // DB::table('users')->insert([
        //     'name'=>'Zumra',
        //     'surename'=>'Alcatel',
        //     'username'=>'zumra',
        //     'subscription_type'=>0,
        //     'user_image_1'=>'default_user_image',
        //     'user_image_2'=>'default_user_image',
        //     'type_of_user'=>0,
        //     'email'=>'zumra@gmail.com',
        //     'email_verified_at'=>\Carbon\Carbon::now(),
        //     'password'=>Crypt::encrypt('Lambda12'),
        // ]);
        // DB::table('user_questionare')->insert([

        //     'user_id'=>3,
        //     'name'=>'Zumra',
        //     'surename'=>'Alactel',
        //     'email'=>'zumra@gmail.com',
        //     'gender'=>'F',
        //     'date_of_birth'=>"24.11.1993",
        // ]);

        DB::table('user_questionare')->insert([

            'user_id'=>2,
            'name'=>'Annie',
            'surename'=>'Leonheart',
            'email'=>'anniel@gmail.com',
            'gender'=>'F',
            'date_of_birth'=>"24.11.1993",

        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'Online Mentoring',
            'subscription_price'=>'150',
            'subscription_description'=>'44 trainings (8 weeks)'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'One on one Training',
            'subscription_price'=>'125',
            'subscription_description'=>'12 trainings'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'Nutrition',
            'subscription_price'=>'100',
            'subscription_description'=>'1 month'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'Tehnique Training by muscle group',
            'subscription_price'=>'100',
            'subscription_description'=>'7 weeks'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'Giant set Program',
            'subscription_price'=>'100',
            'subscription_description'=>'20 Terms'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'Session Consultation after training',
            'subscription_price'=>'15',
            'subscription_description'=>'Half hour/for users who have already bought some program.'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'Session Consultation after training',
            'subscription_price'=>'15',
            'subscription_description'=>'Half hour/for users who have never bought any program.'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'Monthly fee for access to previously bought programs.',
            'subscription_price'=>'5',
            'subscription_description'=>'Monthly fee'
        ]);

        DB::table('subscription_type')->insert([

            'subscription_type'=>'Yearly fee for access to previously bought programs.',
            'subscription_price'=>'2',
            'subscription_description'=>''
        ]);
    }
}
