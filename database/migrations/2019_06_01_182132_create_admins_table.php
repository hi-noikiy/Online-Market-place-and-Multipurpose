<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->time('email_verified_at')->nullable();
            $table->string('ip');
            $table->string('image')->nullable();
            $table->integer('status')->comment('0:deactive,1:active');
            $table->string('address');
            $table->string('mobile');
            $table->string('created_by_email'); 
            $table->date('birthday');
            $table->integer('age');
            $table->integer('gender')->comment('0:female,1:male,3:other')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
