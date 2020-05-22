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
    Route::get('/', 'Api\UserController@index')->middleware('role:admin');
    Route::post('/', 'Api\UserController@store')->middleware('role:admin');
    Route::put('/{user}', 'Api\UserController@update')->middleware('role:admin');
    Route::delete('/{user}', 'Api\UserController@destroy')->middleware('role:admin');
    Route::get('/department', 'Api\UserController@getMyUsersByDepartment')->middleware('role:admin|leader');;
    Route::get('/belong-to-projects', 'Api\UserController@getUsersBelongToProject');
  });

  Route::group(['prefix' => 'departments'], function () {
    Route::get('/', 'Api\DepartmentController@index')->middleware('role:admin');
    Route::get('/my-departments', 'Api\DepartmentController@getMyDepartments')->middleware('role:admin|leader');
    Route::post('/', 'Api\DepartmentController@store')->middleware('role:admin');
    Route::put('/{department}', 'Api\DepartmentController@update')->middleware('role:admin');
    Route::delete('/{department}', 'Api\DepartmentController@destroy')->middleware('role:admin');
  });

  Route::group(['prefix' => 'projects'], function () {
    Route::get('/admin', 'Api\ProjectController@getProjects')->middleware('role:admin');
    Route::get('/', 'Api\ProjectController@getMyProjects');
    Route::get('{id}', 'Api\ProjectController@getProjectById')->middleware('role:admin|leader');
    Route::post('/', 'Api\ProjectController@store')->middleware('role:admin|leader');
    Route::put('/{project}', 'Api\ProjectController@update')->middleware('role:admin|leader');
    Route::put('/{project}/update-department', 'Api\ProjectController@updateDepartmentId')->middleware('role:admin|leader');
    Route::put('/{project}/update-duration', 'Api\ProjectController@updateProjectDuration')->middleware('role:admin|leader');
    Route::delete('/{project}', 'Api\ProjectController@destroy')->middleware('role:admin|leader');
  });

  Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', 'Api\TaskController@getMyTasks');
    Route::get('/department', 'Api\TaskController@getTasksBelongToMyDepartment')->middleware('role:admin|leader');
    Route::get('/project/{project}', 'Api\TaskController@getTasksByProject');
    Route::get('/show/{task}', 'Api\TaskController@show');
    Route::post('/', 'Api\TaskController@store')->middleware('permission:create new task');
    Route::put('/{id}', 'Api\TaskController@update')->middleware('permission:edit task name');
    Route::delete('/{id}', 'Api\TaskController@destroy')->middleware('permission:delete task');
    Route::put('/update-status/{id}', 'Api\TaskController@updateStatus')->middleware('permission:mark done and undone');
    Route::put('/update-assigned-to/{id}', 'Api\TaskController@updateAssignedTo')->middleware('permission:delegate task');
    Route::put('/update-task-results/{id}', 'Api\TaskController@updateTaskResults')->middleware('permission:edit task result');
  });

  Route::group(['prefix' => 'reports', 'middleware' => 'permission:view project report'], function () {
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
    Route::get('/acl', 'Api\RoleController@getRolesPermissions')->middleware('role:admin|leader');
    Route::put('/give-or-revoke-permission', 'Api\RoleController@giveOrRevokePermission')->middleware('role:admin|leader');
  });
});
