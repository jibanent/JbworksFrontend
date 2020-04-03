<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Department;
use App\Models\Project;
use App\Repositories\Project\ProjectRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  protected $projectRepository;

  public function __construct(ProjectRepositoryInterface $projectRepository)
  {
    $this->projectRepository = $projectRepository;
  }

  /**
   * Get all project for superadmin
   */
  public function getProjects(Request $request)
  {
    $userId = $request->user;
    if ($userId !== null) {
      $projects = Project::where('manager_id', $userId)->get();
    } else {
      $projects = $this->projectRepository->getAll();
    }

    $rows = [];
    foreach ($projects as $project) {
      $users = User::select('id', 'name', 'email', 'phone', 'position', 'avatar', 'active')
        ->whereIn('id', json_decode($project->joined_to))->get();

      $usersJoined = [];
      foreach ($users as $user) {
        $user = [
          'id'       => $user->id,
          'name'     => $user->id,
          'email'    => $user->email,
          'phone'    => $user->phone,
          'position' => $user->position,
          'active'   => $user->active,
          'avatar'   => avatar($user->avatar)
        ];
        array_push($usersJoined, $user);
      }


      $project =  [
        "id"            => $project->id,
        "manager_id"    => $project->manager_id,
        "name"          => $project->name,
        "description"   => $project->description,
        "start_date"    => $project->start_date,
        "finish_date"   => $project->finish_date,
        "status_id"     => $project->status_id,
        "joined_to"     => $project->joined_to,
        "active"        => $project->active,
        "created_at"    => $project->created_at,
        "updated_at"    => $project->updated_at,
        "department"    => $project->department->name,
        "status"        => $project->projectStatus->name,
        "status_color"  => $project->projectStatus->color,
        "users_joined"  => $usersJoined,
      ];
      array_push($rows, $project);
    }

    return response()->json([
      'status' => 'success',
      'projects' => $rows,
    ], 200);
  }

  /**
   * Create project
   */
  public function store(ProjectRequest $request)
  {
    try {
      $project = $this->projectRepository->create($request->all());
      return response()->json([
        'status' => 'success',
        'mesage' => 'Thêm mới dự án thành công!',
        'data' => $project,
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function update(ProjectRequest $request, $id)
  {
    try {
      $project = $this->projectRepository->update($id, $request->all());
      return response()->json([
        'status' => 'success',
        'mesage' => 'Chỉnh sửa dự án thành công!',
        'data' => $project
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function destroy($id)
  {
    try {
      $this->projectRepository->delete($id);
      return response()->json(['status' => 'success', 'message' => 'Xóa dự án thành công'], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }
}
