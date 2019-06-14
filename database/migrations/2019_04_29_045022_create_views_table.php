<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_type')->comment('i.e:chore/gig');
            $table->integer('item_id')->comment('0:chore,1:freelancer_gig,2:pro_gig');
            $table->integer('viewer_id')->comment('user_id');
            $table->integer('viewer_type')->comment('all_user/user..0:common_user,1:user');
            $table->integer('view')->comment('number of view')->default(0);
            $table->integer('scale_factor')->comment('function value that maintain scale for same user view')->nullable();
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
        Schema::dropIfExists('views');
    }
}
