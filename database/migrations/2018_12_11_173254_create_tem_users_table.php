<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tem_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('verify_code');
            $table->string('name');
            $table->string('email')->unique();
            $table->tinyInteger('email_status')->default(2)->comment("1=send,2=Not send");
            $table->tinyInteger('status')->default(2)->comment("1=Verify,2=Not Verify");
            $table->string('created_by_ip')->nullable();
            $table->string('updated_by_ip')->nullable();
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
        Schema::dropIfExists('tem_users');
    }
}
