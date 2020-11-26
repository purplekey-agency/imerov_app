<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPersonalBestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_personal_bests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date');
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('bodyfat')->nullable();
            $table->string('imagepath')->nullable();
            $table->string('neck')->nullable();
            $table->string('hips')->nullable();
            $table->string('chest')->nullable();
            $table->string('thigh')->nullable();
            $table->string('bicep')->nullable();
            $table->string('calf')->nullable();
            $table->string('waist')->nullable();
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
        Schema::dropIfExists('user_personal_bests');
    }
}
