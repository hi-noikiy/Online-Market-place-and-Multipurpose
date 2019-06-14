<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialShare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:: create('social_shares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->string('medium');
            $table->integer('user_id');
            $table->date('time');
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
        Schema::table('social_shares', function (Blueprint $table) {
            //
        });
    }
}
