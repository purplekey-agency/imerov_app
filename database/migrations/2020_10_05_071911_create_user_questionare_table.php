<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuestionareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_questionare', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->string('name');
            $table->string('surename');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('job_title')->nullable();
            $table->integer('job_activity_level')->nullable();
            $table->string('working_schedule')->nullable();
            $table->integer('travel_often')->nullable();
            $table->string('list_of_physical_activities')->nullable();
            $table->string('diagnosed_heallth_problems')->nullable();
            $table->string('medications')->nullable();
            $table->string('additional_therapies')->nullable();
            $table->string('injuries_list')->nullable();
            $table->string('additional_therapies_injury')->nullable();
            $table->integer('stress_motivational_problems')->nullable();
            $table->boolean('family_heart_disease')->nullable();
            $table->string('family_heart_disease_list')->nullable();
            $table->boolean('current_cigarete_smoker')->nullable();
            $table->boolean('current_diet_1')->default(false);
            $table->boolean('current_diet_2')->default(false);
            $table->boolean('current_diet_3')->default(false);
            $table->boolean('current_diet_4')->default(false);
            $table->boolean('current_diet_5')->default(false);
            $table->integer('readiness_for_change')->nullable();
            $table->string('best_fit_goals')->nullable();
            $table->string('goal_for_training')->nullable();
            $table->string('why_goal_for_training')->nullable();
            $table->integer('timeline_for_achieing')->nullable();
            $table->string('how_often_wiling_per_week')->nullable();
            $table->integer('rate_motivational_level')->nullable();
            $table->boolean('currently_exercising_regulary')->nullable();
            $table->boolean('personal_trainer_before')->nullable();
            $table->string('what_kind_of_training')->nullable();
            $table->integer('at_what_times_prefer_training')->nullable();
            $table->string('your_expectations', 1024)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_questionare');
    }
}
