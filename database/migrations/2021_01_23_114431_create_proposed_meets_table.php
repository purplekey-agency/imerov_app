<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposedMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposed_meets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('proposed_date');
            $table->string('proposed_time');
            $table->boolean('confirmed')->nullable();
            $table->boolean('done')->nullable();
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
        Schema::dropIfExists('proposed_meets');
    }
}
