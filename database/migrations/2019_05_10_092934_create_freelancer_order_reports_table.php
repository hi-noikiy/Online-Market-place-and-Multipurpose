<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerOrderReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_order_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('status')->comment('0:not_replied,1:replied,2:not_seen')->default('0');
            $table->integer('type')->comment('0:delivery,1:extension_time,2:cancel,3:modification');
            $table->text('comment')->nullable();
            $table->integer('extension_day')->nullable();
            $table->double('modification_money')->nullable();
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
        Schema::dropIfExists('freelancer_order_reports');
    }
}
