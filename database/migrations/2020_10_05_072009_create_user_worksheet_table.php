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
            $table->date('date');
            $table->string('muscle_group');
            $table->string('start');
            $table->string('finish');
            $table->integer('video_id');
            $table->integer('reps_1');
            $table->string('weight_1');
            $table->integer('reps_2');
            $table->string('weight_2');
            $table->integer('reps_3');
            $table->string('weight_3');
            $table->integer('reps_4');
            $table->string('weight_4');
            $table->integer('reps_5');
            $table->string('weight_5');
            $table->integer('reps_6');
            $table->string('weight_6');
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
