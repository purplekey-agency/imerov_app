<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAvaliableDiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_avaliable_diet', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            /**
             * 1 - Lean protein
             * 2 - Vegetables
             * 3 - Fruits
             * 4 - Grains
             * 5 - Healty fats
             * 6 - Dairy products
             * */
            $table->integer('avaliable_food_type');
            $table->string('avaliable_food_name');
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
        Schema::dropIfExists('user_avaliable_diet');
    }
}
