<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatmessages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('RoomId')->reference('id')->on('chatrooms');
            $table->string('sender')->reference('id')->on('users');
            $table->string('receiver')->reference('id')->on('users');

            $table->text('message');
            $table->integer('readWriteStatus')->commment('0:unread,1:read')->default(0);
            $table->integer('activationStatus')->default(1)->comment('1:active,2:deleted,3:spamed');
            $table->string('UTC');
            $table->string('selftime');
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
        Schema::dropIfExists('chatmessages');
    }
}
