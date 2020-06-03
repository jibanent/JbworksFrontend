<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Repositories\Project\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
  protected $projectRepository;

  public function __construct(ProjectRepositoryInterface $projectRepository)
  {
    $this->projectRepository = $projectRepository;
  }

  /**
   * Get all project for super admin
   */
  public function getProjects()
  {
    $projects = ProjectResource::collection($this->projectRepository->getAll());

    return response()->json([
      'status' => 'success',
      'projects' => $projects,
    ], 200);
  }

  /**
   * Get projects that I joined
   */
  public function getMyProjects(Request $request)
  {
    $userId = $request->user;
    $projectByParticipant = Project::whereHas(
      'users',
      function ($query) use ($userId) {
        $query->where('user_id', $userId);
      }
    )->get();
    $projects = ProjectResource::collection($projectByParticipant);

    return response()->json([
      'status' => 'success',
      'projects' => $projects,
    ], 200);
  }

  public function getProjectById($id)
  {
    $project = new ProjectResource($this->projectRepository->find($id));
    return response()->json([
      'status' => 'success',
      'project' => $project,
    ], 200);
  }

  /**
   * Create project
   */
  public function store(ProjectRequest $request)
  {
    DB::beginTransaction();
    try {
      $project = $this->projectRepository->create($request->all());
      $user = User::find($request->followers);
      $project->users()->attach($user);
      DB::commit();
      return response()->json([
        'status' => 'success',
        'message' => 'Thêm mới dự án thành công!',
      ], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function update(Request $request, $id)
  {
    $taskRequest = new ProjectRequest;
    $rule        = $taskRequest->rules(true, false);
    $validator   = Validator::make($request->all(), $rule);
    if ($validator->fails()) return response()->json($validator->errors(), 422);

    try {
      $project = $this->projectRepository->update($id, $request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Chỉnh sửa dự án thành công!',
        'project' => new ProjectResource($project)
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function updateDepartmentId(Request $request, $id)
  {
    $taskRequest = new ProjectRequest;
    $rule        = $taskRequest->rules(false, true);
    $validator   = Validator::make($request->all(), $rule);
    if ($validator->fails()) return response()->json($validator->errors(), 422);
    try {
      $project = $this->projectRepository->update($id, $request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Chỉnh sửa dự án thành công!',
        'project' => new ProjectResource($project)
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  /**
   * Update start_date and finish_date
   */
  public function updateProjectDuration(Request $request, $id)
  {
    try {
      $project = $this->projectRepository->update($id, $request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Chỉnh sửa dự án thành công!',
        'project' => new ProjectResource($project)
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function updateProjectStatus(Request $request, $id)
  {
    try {
      $project = $this->projectRepository->find($id);
      $project->status_id = $request->status_id;
      $project->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Chỉnh sửa dự án thành công!',
        'project' => new ProjectResource($project)
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

  public function removeMemberFromProject(Request $request)
  {
    try {
      $project = Project::findOrFail($request->project_id);
      $user = User::findOrFail($request->user_id);
      if ($project->users()->detach($user)) {
        return response()->json(['status' => 'success'], 200);
      };
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function addMembersToProject(Request $request)
  {
    try {
      $project = Project::findOrFail($request->project_id);
      $result = $project->users()->syncWithoutDetaching($request->members);
      if (!empty($result['attached'])) {
        $users = UserResource::collection(User::whereIn('id', $result['attached'])->get());
        return response()->json(['status' => 'success', 'users' => $users], 200);
      }
    } catch (\Exception $exception) {
      throw $exception;
    }
  }
}
