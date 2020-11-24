<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDietPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_diet_plan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date');
            $table->string('meal_no');
            $table->string('meal_type_1')->nullable();
            $table->string('meal_weight_1')->nullable();
            $table->string('meal_type_2')->nullable();
            $table->string('meal_weight_2')->nullable();
            $table->string('meal_type_3')->nullable();
            $table->string('meal_weight_3')->nullable();
            $table->string('meal_type_4')->nullable();
            $table->string('meal_weight_4')->nullable();
            $table->string('meal_type_5')->nullable();
            $table->string('meal_weight_5')->nullable();
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
        Schema::dropIfExists('user_diet_plan');
    }
}
