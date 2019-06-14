<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('project_id');
            $table->string('cover_letter');
            $table->float('amount', 8, 2);
            $table->date('delivery_date');
            $table->tinyInteger('status')->default(1)->comment('1=Pending, 2=Active, 3=Complete, 4=Cancel, 5=Revision,6=Dispute, 7=Invitation');
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
        Schema::dropIfExists('applies');
    }
}
