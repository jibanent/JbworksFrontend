<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTaskStatusesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('task_statuses', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('slug');
      $table->string('color')->nullable();
    });

    Schema::table('tasks', function ($table) {
      $table->foreign('status_id')->references('id')->on('task_statuses')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('task_statuses');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  }
}
