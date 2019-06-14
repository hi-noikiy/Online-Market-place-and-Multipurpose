<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('secondary_email');
            $table->string('random_code_1')->nullable();
            $table->string('confirm_code_1')->nullable();
            $table->string('random_code_2')->nullable();
            $table->string('confirm_code_2')->nullable();
            $table->text('answer');
            $table->integer('admin_id');
            $table->integer('question_id');
            $table->integer('status')->comment('0:deactive,1:active')->default(1);
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
        Schema::dropIfExists('super_admins');
    }
}
