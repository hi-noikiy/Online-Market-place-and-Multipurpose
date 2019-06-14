<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusChoreProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chore_proposals', function (Blueprint $table) {
            $table->integer('status')->comment('0:not_accepted, 1:accepted,2:denied')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chore_proposals', function (Blueprint $table) {
            //
        });
    }
}
