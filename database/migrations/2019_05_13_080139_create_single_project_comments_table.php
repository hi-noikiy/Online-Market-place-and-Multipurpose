<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingleProjectCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_project_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment')->nullable();
            $table->string('file')->nullable();
            $table->integer('sender')->comment('who send this');
            $table->timestamps();
            $table->integer('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('single_project_comments');
    }
}
