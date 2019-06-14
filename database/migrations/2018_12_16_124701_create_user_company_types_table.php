<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCompanyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_company_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('status')->default(1)->comment("1=Active,2=InActive");
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
        Schema::dropIfExists('user_company_types');
    }
}
