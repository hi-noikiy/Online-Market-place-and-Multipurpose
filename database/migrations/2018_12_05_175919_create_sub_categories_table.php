<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('name');
            $table->text('remarks')->nullable();
            $table->integer('created_by');
            $table->string('created_by_ip', 50);
            $table->integer('updated_by')->nullable();
            $table->string('updated_by_ip', 50)->nullable();
            $table->tinyInteger('status')->default(1)->comment("1=Active,2=Inactive");
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
        Schema::dropIfExists('sub_categories');
    }
}
