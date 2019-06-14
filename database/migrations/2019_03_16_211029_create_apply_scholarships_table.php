<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('scholarship_id');
            $table->tinyInteger('status')->default(1)->comment("1=Apply");
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
        Schema::dropIfExists('apply_scholarships');
    }
}
