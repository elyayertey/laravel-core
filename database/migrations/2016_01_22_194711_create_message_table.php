<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('subject');
            $table->text('content');
            $table->integer('sender_id')->references('users')->on('id');
            $table->timestamp('date_created')->default(Carbon::now());
            $table->integer('read')->default('0');
            $table->integer('active')->default('1');
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
        Schema::drop('table=messages');
    }
}
