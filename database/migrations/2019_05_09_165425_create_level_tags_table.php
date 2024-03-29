<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userleveler')->comment('setter');
            $table->integer('userbeenleveled')->comment('getter');
            $table->string('value')->comment('camelCase');
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
        Schema::dropIfExists('level_tags');
    }
}
