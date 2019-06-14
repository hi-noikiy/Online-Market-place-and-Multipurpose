<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('institution');
            $table->text('description');
            $table->float('price', 8, 2);
            $table->tinyInteger('availablity')->default(1)->comment("1=Available, 2= Unavailable");           
            $table->integer('created_by');
            $table->tinyInteger('status')->default(1)->comment("1=Active, 2=Inactive");           
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
        Schema::dropIfExists('courses');
    }
}
