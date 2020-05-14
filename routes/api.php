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
Route::group(['middleware' => 'auth:api'], function () {
  Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'Api\UserController@index');
    Route::post('/', 'Api\UserController@store');
    Route::put('/{user}', 'Api\UserController@update');
    Route::delete('/{user}', 'Api\UserController@destroy');
    Route::get('/department', 'Api\UserController@getMyUsersByDepartment');
    Route::get('/belong-to-projects', 'Api\UserController@getUsersBelongToProject');
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
    Route::get('{id}', 'Api\ProjectController@getProjectById');
    Route::post('/', 'Api\ProjectController@store');
    Route::put('/{project}', 'Api\ProjectController@update');
    Route::delete('/{project}', 'Api\ProjectController@destroy');
  });

  Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', 'Api\TaskController@getMyTasks');
    Route::get('/department', 'Api\TaskController@getTasksBelongToMyDepartment');
    Route::get('/project/{project}', 'Api\TaskController@getTasksByProject');
    Route::get('/show/{task}', 'Api\TaskController@show');
    Route::post('/', 'Api\TaskController@store');
    Route::put('/{id}', 'Api\TaskController@update');
    Route::delete('/{id}', 'Api\TaskController@destroy');
    Route::put('/update-status/{id}', 'Api\TaskController@updateStatus');
    Route::put('/update-assigned-to/{id}', 'Api\TaskController@updateAssignedTo');
    Route::put('/update-task-results/{id}', 'Api\TaskController@updateTaskResults');
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
    Route::get('/task-stats-by-date', 'Api\ReportController@taskStatisticsByDate');
    Route::get('/task-stats-by-week', 'Api\ReportController@taskStatisticsByWeek');
  });

  Route::group(['prefix' => 'roles'], function () {
    Route::get('/', 'Api\RoleController@getRoles');
  });
});
