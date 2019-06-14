<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skill_details', function (Blueprint $table) {
           $table->integer('item_id')->comment('-10 means->not item')->default(-10);
           $table->integer('item_type')->comment( ' 0: Project, 1: Job ')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skill_details', function (Blueprint $table) {
            //
        });
    }
}
