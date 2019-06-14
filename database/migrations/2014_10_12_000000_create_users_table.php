<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mobile');
           
            $table->string('password');
            $table->tinyInteger('user_type')->default(3)->comment("1=Admin,2=Customer,3=Feelancer,4=Pro,5=Job_seeker,6=company,7=general");
            $table->tinyInteger('user_sub_type')->nullable()->comment("1=Company,2=Individual");
            $table->tinyInteger('status')->default(2)->comment("1=Active,2=Inactive,3=Suspend");
            $table->string('created_by_ip')->nullable();
            $table->string('updated_by_ip')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
