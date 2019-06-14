<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceToChore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chores', function (Blueprint $table) {
            $table->integer('type')->comment('1:chore,2:service')->default(1);
            $table->integer('delivery_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chores', function (Blueprint $table) {
            //
        });
    }
}
