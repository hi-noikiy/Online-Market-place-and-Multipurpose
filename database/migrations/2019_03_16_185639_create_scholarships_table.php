<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('institution');
            $table->text('description');
            $table->string('email');
            $table->string('website');
            $table->string('phone');
            $table->string('budget');
            $table->tinyInteger('duration')->nullable()->comment('Always insert month');
            $table->tinyInteger('experience')->nullable();
            $table->date('end_date');
            $table->tinyInteger('type')->default(3)->comment("1=Fulltime, 2=Part-time,3=Free");
            $table->integer('location_id')->nullable();
            $table->integer('country_id')->nullable();            
            $table->integer('created_by');
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
        Schema::dropIfExists('scholarships');
    }
}
