<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerProjectProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_project_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('proposal_sender/user_id');
            $table->integer('gig_id')->nullable();
            $table->integer('project_id');
            $table->integer('delivery_time');
            $table->double('price');

            $table->text('description')->nullable();
            $table->integer('status')->comment('0:not_accepted, 1:accepted,2:denied')->default(0);
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
        Schema::dropIfExists('freelancer_project_proposals');
    }
}
