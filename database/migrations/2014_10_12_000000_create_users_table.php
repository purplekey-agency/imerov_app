<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surename');
            $table->string('username');
            $table->integer('subscription_type')->default(0);
            $table->string('user_image_1')->nullable();
            $table->string('user_image_2')->nullable();
            $table->integer('type_of_user')->default(0);
            $table->string('email')->unique();
            $table->string('worksheet')->unique()->nullable();
            $table->string('diet_plan')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
