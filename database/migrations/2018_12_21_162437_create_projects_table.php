<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->text('skill_ids');
            $table->text('language_ids');
            $table->double('budget');
            $table->integer('qualification')->nullable();
            $table->double('experience')->nullable();
            $table->integer('age')->nullable();
            $table->tinyInteger('expert_level')->default(1)->comment("1=Beginner, 2=Intermediate, 3=Expert");
            $table->tinyInteger('user_type')->default(1)->comment("1=Feelancer, 2=Pro");
            $table->tinyInteger('type')->nullable()->comment("1=Project, 2=Job, 3=Internship, 4=Scholarship, 5=Traning");
            $table->tinyInteger('job_type')->nullable()->comment("1=Fulltime, 2=Partime");
            $table->integer('vacancy')->nullable();
            $table->integer('location')->nullable();
            $table->integer('country')->nullable();
            $table->integer('viewers')->nullable();
            $table->tinyInteger('status')->comment("1=Active, 2=Deactive, 3=Complete");
            $table->integer('created_by');
            $table->timestamps();

            // $table->double('price');
            // $table->tinyInteger('freelancer_type')->nullable()->comment("1=Feelancer,2=Pro");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
