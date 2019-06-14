<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('item_id')->comment('0:chore,1:admin,2:customer,3:freelancer,4:Pro,5:jobseeker,6:service');
            $table->integer('item_type');
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
        Schema::dropIfExists('slags');
    }
}
