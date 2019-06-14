<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gigs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('short_description')->comment('designation');
            $table->text('long_description');
            $table->integer('type')->comment('0:freelancer_gig,1:pro_gig');
            $table->double('price1');
            $table->double('price2')->nullable();
            $table->double('price3')->nullable();
            $table->integer('delivery_time1');
            $table->integer('delivery_time2')->nullable();
            $table->integer('delivery_time3')->nullable();
            $table->string('address');
            $table->integer('category_id');
            $table->string('ip')->nullable();
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
        Schema::dropIfExists('gigs');
    }
}
