<?php

use App\SubscriptionSubtype;
use App\SubscriptionType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //users

        DB::table('users')->insert([

            'name'=>'Elvir',
            'surename'=>'Imerov',
            'username'=>'eimerov',
            'subscription_type'=>0,
            'user_image_1'=>'default_user_image',
            'user_image_2'=>'default_user_image',
            'type_of_user'=>2,
            'email'=>'eyeager@gmail.com',
            'password'=>Crypt::encrypt('m1OwkjtwlDnFODrVEOqh'),

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

        DB::table('subscription_type')->insert([

            'subscription_type'=>'Online Mentoring',
            'subscription_price'=>'150',
            'subscription_description'=>'Živite zdravije uz dr. Imerova!
            •	12 sedmica
            •	44 video treninga
            •	personalizovani plan ishrane 
            •	praćenje rezultata
            •	2 sata video chat savjetovanja'
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

        // DB::table('subscription_type')->insert([

        //     'subscription_type'=>'Tehnique Training by muscle group',
        //     'subscription_price'=>'100',
        //     'subscription_description'=>'7 weeks'
        // ]);
        
        // DB::table('subscription_type')->insert([
        //     'subscription_type'=>'LION MUSCLE',
        //     'subscription_price'=>'100',
        //     'subscription_description'=>'Živite zdravije uz dr. Imerova!
        //     •	10 sedmica
        //     •	20 video treninga
        //     •	Dynamic stretching/warm up video
        //     •	Static stretching video
        //     •	praćenje rezultata'
        // ]);

        $lion_muscle_subscription = SubscriptionType::create([
            'subscription_type'=>'LION MUSCLE',
            'subscription_price'=>'100',
            'subscription_description'=>'Živite zdravije uz dr. Imerova!
            •	10 sedmica
            •	20 video treninga
            •	Dynamic stretching/warm up video
            •	Static stretching video
            •	praćenje rezultata'
        ]);

        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Ramena'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Bicepsi'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Tricepsi'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Prsa'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Leđa'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Kvadriceps'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Zadnje Lože'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Trbušni mišići'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Trapez'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Podlaktice'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_muscle_subscription->id,
            'subtype' => 'Listovi'
        ]);
        

        // DB::table('subscription_type')->insert([
        //     'subscription_type'=>'LIONS ROUTINE',
        //     'subscription_price'=>'100',
        //     'subscription_description'=>'Živite zdravije uz dr. Imerova!
        //     •	6-9 sedmica
        //     •	12-18 video treninga
        //     •	Dynamic stretching/warm up video
        //     •	Static stretching video
        //     •	praćenje rezultata'
        // ]);

        $lion_routine_subscription = SubscriptionType::create([
            'subscription_type'=>'LIONS ROUTINE',
            'subscription_price'=>'100',
            'subscription_description'=>'Živite zdravije uz dr. Imerova!
            •	6-9 sedmica
            •	12-18 video treninga
            •	Dynamic stretching/warm up video
            •	Static stretching video
            •	praćenje rezultata'
        ]);

        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Hipertrofija'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Prioriteti'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Džinovski set 10s'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Snaga'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Shredding'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Super Pump-Up'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Džinovski set 5s'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Fiber Sweep'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Drop Set'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Superset ( agonist / antagonist )'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Piramida'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Superset'
        ]);
        SubscriptionSubtype::create([
            'subscription_id' => $lion_routine_subscription->id,
            'subtype' => 'Obrnuta Piramida'
        ]);

        // DB::table('subscription_type')->insert([

        //     'subscription_type'=>'Giant set Program',
        //     'subscription_price'=>'100',
        //     'subscription_description'=>'20 Terms'
        // ]);

        DB::table('subscription_type')->insert([
            'subscription_type'=>'SENIOR PROGRAM',
            'subscription_price'=>'100',
            'subscription_description'=>'Živite zdravije uz dr. Imerova!
            •	8 sedmica
            •	24 video treninga
            •	Dynamic stretching/warm up video
            •	Static stretching video
            •	praćenje rezultata'
        ]);

        DB::table('subscription_type')->insert([
            'subscription_type'=>'GVT (German Volume Training) PROGRAM',
            'subscription_price'=>'100',
            'subscription_description'=>'Živite zdravije uz dr. Imerova!
            •	2 faze
            •	45 dana 
            •	27 termina
            •	Dynamic stretching/warm up video
            •	Static stretching video
            •	praćenje rezultata'
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
