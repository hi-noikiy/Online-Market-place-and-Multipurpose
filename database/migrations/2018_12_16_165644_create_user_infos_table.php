<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment("Users primary ID");
            $table->integer('hourly_rate')->nullable();
            $table->string('designation')->nullable();
            $table->string('note')->nullable();
            $table->tinyInteger('gender')->nullable()->comment("1=Male,2=Female");
            $table->string('skill_ids')->nullable();
            $table->string('physical_add')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tag_line')->nullable();
            $table->tinyInteger('company_type')->nullable()->comment("User_company_typies primary ID");
            $table->tinyInteger('company_category')->nullable()->comment("User_company_categories primary ID");
            $table->string('company_des')->nullable();            
            $table->double('rating')->nullable();
            $table->tinyInteger('is_verified')->nullable();
            $table->tinyInteger('is_available')->default(1)->comment("1=Available, 2= Offline");
            $table->integer('location');
            $table->integer('country');
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
        Schema::dropIfExists('user_infos');
    }
}
