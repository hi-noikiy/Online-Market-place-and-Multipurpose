<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pros', function (Blueprint $table) {
            $table->string('profile_image')->nullable();
            $table->integer('year_of_experience')->nullable();
            $table->tinyInteger('level')->default(0);
            $table->double('hourly_rate')->nullable();
            $table->integer('availability')->comment('0:permenant,1:part_time,2:intern')->nullable();
            $table->integer('gender')->comment('1:male,2:female,3:other')->nullable();
            $table->tinyInteger('verified_at')->default(0)->comment('0:not,1:yes');
            $table->integer('age')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pros', function (Blueprint $table) {
            //
        });
    }
}
