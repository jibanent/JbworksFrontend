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
    Route::get('/', 'Api\UserController@index')->middleware('role:admin|leader');
    Route::get('/leader-manager', 'Api\UserController@getUsersHasLeaderAndManagerRole')->middleware('role:admin|leader|manager');
    Route::post('/', 'Api\UserController@store')->middleware('permission:create new user');
    Route::get('/template', 'Api\UserController@downloadExcelTemplate')->middleware('permission:create new user');
    Route::post('/import', 'Api\UserController@import')->middleware('permission:create new user');
    Route::put('/update/{id}', 'Api\UserController@update')->middleware('permission:edit user');
    Route::put('/update-profile', 'Api\UserController@updateMyProfile');
    Route::delete('/{user}', 'Api\UserController@destroy')->middleware('permission:delete user');
    Route::get('/department', 'Api\UserController@getMyUsersByDepartment')->middleware('role:admin|leader|manager');;
    Route::get('/project-members', 'Api\UserController@getProjectParticipants');
    Route::put('/change-password', 'Api\UserController@changePassword');
  });


  Route::group(['prefix' => 'notifications'], function () {
    Route::get('/', 'Api\NotificationController@getMyNotifications');
    Route::put('/mark-as-read', 'Api\NotificationController@markAsRead');
  });

  Route::group(['prefix' => 'departments'], function () {
    Route::get('/', 'Api\DepartmentController@index')->middleware('role:admin');
    Route::get('/my-departments', 'Api\DepartmentController@getMyDepartments')->middleware('role:admin|leader|manager');
    Route::get('/show/{id}', 'Api\DepartmentController@show');
    Route::post('/', 'Api\DepartmentController@store')->middleware('role:admin|leader|manager');
    Route::put('/{department}', 'Api\DepartmentController@update')->middleware('role:admin|leader');
    Route::put('/parent/{department}', 'Api\DepartmentController@updateParentId')->middleware('role:admin|leader');
    Route::delete('/{department}', 'Api\DepartmentController@destroy')->middleware('role:admin|leader');
  });

  Route::group(['prefix' => 'projects'], function () {
    Route::get('/admin', 'Api\ProjectController@getProjects')->middleware('role:admin');
    Route::get('/', 'Api\ProjectController@getMyProjects');
    Route::get('/manager', 'Api\ProjectController@getProjectsByManagerId')->middleware('role:admin|leader|manager');
    Route::get('/active', 'Api\ProjectController@getActiveProjectsByManagerId');
    Route::get('{id}', 'Api\ProjectController@getProjectById')->middleware('role:admin|leader|manager');
    Route::post('/', 'Api\ProjectController@store')->middleware('role:admin|leader|manager');
    Route::post('/remove-member', 'Api\ProjectController@removeMemberFromProject')->middleware('role:admin|leader|manager');
    Route::post('/add-member', 'Api\ProjectController@addMembersToProject')->middleware('role:admin|leader|manager');
    Route::put('/{project}', 'Api\ProjectController@update')->middleware('role:admin|leader|manager');
    Route::put('/{project}/update-department', 'Api\ProjectController@updateDepartmentId')->middleware('role:admin|leader|manager');
    Route::put('/{project}/update-duration', 'Api\ProjectController@updateProjectDuration')->middleware('role:admin|leader|manager');
    Route::put('/{project}/update-status', 'Api\ProjectController@updateProjectStatus')->middleware('role:admin|leader|manager');
    Route::put('/{project}/change-manager', 'Api\ProjectController@changeProjectManager')->middleware('role:admin|leader|manager');
    Route::put('/{project}/close-or-reopen', 'Api\ProjectController@closeOrReopenProject')->middleware('role:admin|leader|manager');
    Route::delete('/{project}', 'Api\ProjectController@destroy')->middleware('role:admin|leader|manager');
  });

  Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', 'Api\TaskController@getMyTasks');
    Route::get('/admin', 'Api\TaskController@getTasks');
    Route::get('/department', 'Api\TaskController@getTasksBelongToMyDepartment')->middleware('role:admin|leader|manager');
    Route::get('/project/{project}', 'Api\TaskController@getTasksByProject');
    Route::get('/show/{task}', 'Api\TaskController@show');
    Route::get('/count/my-tasks', 'Api\TaskController@countTasksByUser');
    Route::post('/', 'Api\TaskController@store')->middleware('permission:create new task');
    Route::put('/{id}', 'Api\TaskController@update')->middleware('permission:edit task name');
    Route::delete('/{id}', 'Api\TaskController@destroy')->middleware('permission:delete task');
    Route::put('/update-status/{id}', 'Api\TaskController@updateStatus')->middleware('permission:mark done and undone');
    Route::put('/update-assigned-to/{id}', 'Api\TaskController@updateAssignedTo')->middleware('permission:delegate task');
    Route::put('/update-task-results/{id}', 'Api\TaskController@updateTaskResults')->middleware('permission:edit task result');
    Route::put('/update-task-name/{id}', 'Api\TaskController@updateTaskName')->middleware('permission:edit task name');
    Route::put('/update-task-deadline/{id}', 'Api\TaskController@updateTaskDeadline')->middleware('permission:edit start date and deadline');
    Route::put('/update-task-start-time/{id}', 'Api\TaskController@updateTaskStartTime')->middleware('permission:edit start date and deadline');
    Route::put('/update-task-description/{id}', 'Api\TaskController@updateTaskDescription')->middleware('permission:edit task description');
    Route::put('/toggle-urgent/{id}', 'Api\TaskController@toggleUrgent');
    Route::put('/toggle-important/{id}', 'Api\TaskController@toggleImportant');
    Route::put('/toggle-mark-star/{id}', 'Api\TaskController@toggleMarkStar');
    Route::delete('/{id}', 'Api\TaskController@destroy')->middleware('permission:delete task');
    Route::post('/import', 'Api\TaskController@import')->middleware('permission:create new task');
    Route::get('/template', 'Api\TaskController@downloadExcelTemplate')->middleware('permission:create new task');
    Route::get('/export', 'Api\TaskController@export');
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

  Route::group(['prefix' => 'conversations'], function () {
    Route::get('/', 'Api\ConversationController@getSingleUserConversations');
    Route::post('/add-users', 'Api\ConversationController@addUsersToConversation');
    Route::put('/{id}', 'Api\ConversationController@update');
  });

  Route::group(['prefix' => 'messages'], function () {
    Route::get('/', 'Api\MessageController@index');
    Route::get('users', 'Api\MessageController@getUsers');
    Route::post('/', 'Api\MessageController@store');
    Route::post('conversation-message', 'Api\MessageController@storeConversationAndMessage');
    Route::post('mark-read', 'Api\MessageController@markRead');
  });
});
