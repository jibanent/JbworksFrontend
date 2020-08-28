<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('messages', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('conversation_id')->unsigned()->nullable();
      $table->integer('sender_id')->unsigned();
      $table->text('message');
      $table->timestamp('read_at')->nullable();
      $table->timestamps(6);
      $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
      $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('messages');
  }
}
