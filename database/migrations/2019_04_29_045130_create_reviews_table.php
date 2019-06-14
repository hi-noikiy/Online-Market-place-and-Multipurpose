<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->comment('0:chore,1:freelancer_gig,2:pro_gig,3:person');
            $table->integer('item_type')->comment('i.e:chore/gig/persons');
            $table->double('number')->comment('points of review')->default(0.00);
            $table->integer('giver_id')->comment('user_id');
            $table->integer('giver_type')->comment( 'user_type..0:common_user,1:user');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
