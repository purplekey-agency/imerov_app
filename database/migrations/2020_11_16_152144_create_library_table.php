<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library', function (Blueprint $table) {
            $table->id();
            $table->string('exercise_name');
            $table->string('video_path_m')->nullable();
            $table->string('video_path_f')->nullable();
            $table->text('exercise_description');
            $table->boolean('subtype_1')->default(false);
            $table->boolean('subtype_2')->default(false);
            $table->boolean('subtype_3')->default(false);
            $table->boolean('subtype_4')->default(false);
            $table->boolean('subtype_5')->default(false);
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
        Schema::dropIfExists('library');
    }
}
