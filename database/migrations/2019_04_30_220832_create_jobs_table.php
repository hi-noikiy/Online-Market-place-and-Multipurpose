<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('file')->nullable();
            $table->double('min');
            $table->double('max');
            $table->integer('customer')->comment('customer_id');
            $table->integer('job_category_id')->comment('job_category');
            $table->string('Location')->nullable();
            $table->integer('jobpro')->comment('0:Project,1:Job');
            $table->integer('type')->comment('0:permenant,1:part_time,2:intern,3:temporary')->nullable();
            $table->integer('duration');
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
        Schema::dropIfExists('jobs');
    }
}
