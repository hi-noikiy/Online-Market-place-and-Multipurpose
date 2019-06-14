<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConvertToReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freelancer_order_reports', function (Blueprint $table) {
            $table->integer('customer_id')->nullable();
            $table->integer('seller_id')->comment('other User Id')->nullable();
            $table->integer('freelancer_type')->comment('0:freelancer,1:pro')->nullable();
            $table->integer('proposal_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('freelancer_order_reports', function (Blueprint $table) {
            //
        });
    }
}
