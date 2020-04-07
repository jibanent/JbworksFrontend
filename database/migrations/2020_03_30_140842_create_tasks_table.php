<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tasks', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('project_id')->unsigned();
      $table->integer('assigned_to')->unsigned()->comment('who is assigned to do the task');
      $table->string('name');
      $table->text('description')->nullable();
      $table->dateTime('start_date')->nullable();
      $table->dateTime('due_on')->nullable();
      $table->dateTime('completed_date')->nullable();
      $table->integer('status_id')->unsigned()->default(1)->comment('the status of the project: processing, completed');
      $table->boolean('is_overdue')->default(0);
      $table->boolean('late_completed')->default(0);
      $table->integer('created_by');
      $table->timestamps();
      $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
      $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('tasks');
  }
}
