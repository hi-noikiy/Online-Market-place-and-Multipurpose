<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDesCoress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->string('silver_short_description');
            $table->text('silver_brief_description');
            $table->string('gold_short_description');
            $table->text('gold_brief_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gigs', function (Blueprint $table) {
            //
        });
    }
}
