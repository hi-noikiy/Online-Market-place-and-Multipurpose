<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircularForCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circular_for_candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('designation');
            $table->integer('status')->comment('0:deactive,1:active')->default(1);
            $table->double('salary')->nullable();
            $table->text('location')->nullable();
            $table->text('responsibilities')->nullable();
            $table->date('expire_date');
            $table->integer('company_id');
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
        Schema::dropIfExists('circular_for_candidates');
    }
}
