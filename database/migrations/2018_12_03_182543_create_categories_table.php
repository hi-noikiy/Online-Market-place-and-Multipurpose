<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('icon')->nullable();
            $table->text('remarks')->nullable();
            $table->tinyInteger('type')->default(1)->comment("1=UI, 2=Freelancer/Pro");
            $table->tinyInteger('status')->default(1)->comment("1=Active, 2=Inactive");
            $table->integer('created_by');
            $table->string('created_by_ip', 50);
            $table->integer('updated_by')->nullable();
            $table->string('updated_by_ip', 50)->nullable();            
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
        Schema::dropIfExists('categories');
    }
}
