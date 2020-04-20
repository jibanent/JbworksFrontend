<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

  // return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
  Route::post('login', 'Api\AuthController@login');
  Route::post('logout', 'Api\AuthController@logout');
  Route::post('refresh', 'Api\AuthController@refresh');
  Route::post('me', 'Api\AuthController@me');
});

Route::group(['prefix' => 'users'], function () {
  Route::get('/', 'Api\UserController@index');
  Route::post('/', 'Api\UserController@store');
  Route::put('/{user}', 'Api\UserController@update');
  Route::delete('/{user}', 'Api\UserController@destroy');

  Route::get('/department', 'Api\UserController@getMyUsersByDepartment');
});

Route::group(['prefix' => 'departments'], function () {
  Route::get('/', 'Api\DepartmentController@index');
  Route::post('/', 'Api\DepartmentController@store');
  Route::put('/{department}', 'Api\DepartmentController@update');
  Route::delete('/{department}', 'Api\DepartmentController@destroy');
});

Route::group(['prefix' => 'projects'], function () {
  Route::get('/admin', 'Api\ProjectController@getProjects');
  Route::get('/', 'Api\ProjectController@getMyProjects');
  Route::post('/', 'Api\ProjectController@store');
  Route::put('/{project}', 'Api\ProjectController@update');
  Route::delete('/{project}', 'Api\ProjectController@destroy');
});

Route::group(['prefix' => 'tasks'], function () {
  Route::get('/', 'Api\TaskController@getMyTasks');
  Route::get('/department', 'Api\TaskController@getTasksBelongToMyDepartment');
  Route::get('/show/{task}', 'Api\TaskController@show');
  Route::post('/', 'Api\TaskController@store');
  Route::put('/{task}', 'Api\TaskController@update');
  Route::delete('/{task}', 'Api\TaskController@destroy');
});

Route::group(['prefix' => 'reports'], function () {
  Route::get('/project-stats', 'Api\ReportController@countProject');
  Route::get('/task-stats', 'Api\ReportController@countTask');
  Route::get('/department-stats', 'Api\ReportController@countDepartment');
  Route::get('/user-stats', 'Api\ReportController@countUser');
  Route::get('/excellent-member', 'Api\ReportController@getExcellentMember');
  Route::get('/task-stats-by-member', 'Api\ReportController@taskStatisticsByMember');
  Route::get('/most-tasks-ahead', 'Api\ReportController@getMostTasksAhead');
  Route::get('/top-delayed', 'Api\ReportController@getTopDelayed');
  Route::get('/task-stats-by-project', 'Api\ReportController@taskStatisticsByProject');
  Route::get('/task-stats-by-department', 'Api\ReportController@taskStatisticsByDepartment');
});
