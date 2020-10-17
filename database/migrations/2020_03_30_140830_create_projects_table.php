<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('projects', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('department_id')->unsigned();
      $table->integer('manager_id')->unsigned();
      $table->string('name');
      $table->text('description')->nullable();
      $table->date('start_date')->nullable();
      $table->date('finish_date')->nullable();
      $table->string('open_status', 10)->default('on_track')->nullable()->comment('on_track: On track, off_track: Off track, at_risk: At risk');
      $table->string('close_status', 10)->nullable()->comment('success: Successful, failed: Failed, canceled: Canceled');
      $table->boolean('is_internal')->default(true)->comment('0: external project, 1: internal project');
      $table->boolean('active')->default()->comment('1: active, 0: closed');
      $table->string('google_drive_folder_id')->nullable();
      $table->softDeletes();
      $table->timestamps();
      $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('projects');
  }
}
