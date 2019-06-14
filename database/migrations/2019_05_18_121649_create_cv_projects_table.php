<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cv_id');
            $table->string('tytle');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->text('skills_required')->comment('skills comma separeted')->nullable();
            $table->text('supervisor')->nullable();
            $table->string('type')->nullable()->comment('ex. academic');
            $table->text('link')->nullable();
            $table->text('reference')->nullable();
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
        Schema::dropIfExists('cv_projects');
    }
}
