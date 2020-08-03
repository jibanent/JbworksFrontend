<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('department_id')->unsigned();
      $table->string('name');
      $table->string('username')->unique();
      $table->string('email')->unique();
      $table->string('phone')->unique()->nullable();
      $table->date('birthday')->nullable();
      $table->string('address')->nullable();
      $table->string('position')->nullable();
      $table->string('password');
      $table->string('avatar')->nullable();
      $table->boolean('active')->default(true)->comment('is user active or deactivated');
      $table->softDeletes();
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}
