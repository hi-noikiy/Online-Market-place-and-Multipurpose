<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProFreeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_free_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->double('price');
            $table->integer('delivery_time')->nullable();
            $table->integer('freelancer_type')->comment('0:freelancer,1:pro');
            $table->integer('freelancer_id');
            $table->integer('proposal_id')->comment('if freelancer_type=0 then free_project_proposal, =1 then pro_job_proposal');
            $table->text('comment')->nullable();
            $table->integer('status')->comment('0:still_not_complete,1:complete,2:revision,3:pay_pending,4:dispute,5:cancel')->default(0);
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
        Schema::dropIfExists('pro_free_orders');
    }
}
