<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('departments', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('parent_id')->default(0);
      $table->integer('manager_id')->unsigned()->unique()->comment('department manager');
      $table->string('name');
      $table->boolean('active')->default(true)->comment('is department active or not');
      $table->integer('created_by');
      $table->timestamps();
      $table->foreign('manager_id')->references('id')->on('users');
    });

    // Schema::table('users', function ($table) {
    //   $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
    // });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::dropIfExists('departments');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  }
}
