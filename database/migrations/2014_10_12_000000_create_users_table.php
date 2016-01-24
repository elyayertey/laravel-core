<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

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
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('gender', 6)->nullable();
            $table->text('bio')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('street')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('photo')->nullable();
            $table->integer('ip_address')->nullable();
            $table->integer('user_level')->default('1');
            $table->string('is_active')->default('Blocked');
            $table->integer('is_subscriber')->default('0');
            $table->timestamp('expires_on')->nullable();
            $table->timestamp('last_login')->default(Carbon::now());
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
        Schema::drop('users');
    }
}
