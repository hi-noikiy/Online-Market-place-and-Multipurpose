<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('creator');
            $table->double('price');
            $table->integer('gifted')->nullable();
            $table->string('description');
            $table->integer('view')->default(0)->nullable();
            $table->integer('precidance')->comment('1:featured,2:normal')->default(2);
            $table->integer('status')->default('1')->comment('1:active, 0:deactive');
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
        Schema::dropIfExists('chores');
    }
}
