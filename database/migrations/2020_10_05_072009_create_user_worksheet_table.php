<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWorksheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_worksheet', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('video_id');
            // $table->date('date');
            $table->string('muscle_group');
            $table->string('start');
            $table->string('finish');
            $table->integer('reps_1')->nullable();
            $table->string('weight_1')->nullable();
            $table->integer('reps_2')->nullable();
            $table->string('weight_2')->nullable();
            $table->integer('reps_3')->nullable();
            $table->string('weight_3')->nullable();
            $table->integer('reps_4')->nullable();
            $table->string('weight_4')->nullable();
            $table->integer('reps_5')->nullable();
            $table->string('weight_5')->nullable();
            $table->integer('reps_6')->nullable();
            $table->string('weight_6')->nullable();
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
        Schema::dropIfExists('user_worksheet');
    }
}
