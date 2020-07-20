<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Repositories\Project\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\User as UserResource;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
  protected $projectRepository;
  protected $department;
  protected $user;
  protected $project;

  public function __construct(ProjectRepositoryInterface $projectRepository, Department $department, User $user, Project $project)
  {
    $this->projectRepository = $projectRepository;
    $this->department = $department;
    $this->user = $user;
    $this->project = $project;
  }

  /**
   * Get all project for super admin
   */
  public function getProjects(Request $request)
  {
    $search = $request->search;
    $active = $request->active;
    $openStatus = $request->open_status;
    $closeStatus = $request->close_status;

    $projects = new Project;

    if ($search !== null) $projects = $projects->search($search);
    if ($active !== null) $projects = $projects->where('active', $active);
    if ($openStatus !== null) $projects = $projects->where('open_status', $openStatus);
    if ($closeStatus !== null) $projects = $projects->where('close_status', $closeStatus);

    $projects = $projects->paginated();
    return ProjectResource::collection($projects);
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

  /**
   * Get projects by manager_id
   */
  public function getProjectsByManagerId(Request $request)
  {
    $search = $request->search;
    $active = $request->active;
    $openStatus = $request->open_status;
    $closeStatus = $request->close_status;
    $departmentId = auth()->user()->department_id;

    $departments = $this->department->with('subdepartments')->where('id', $departmentId)->first();
    $departmentsIds = $this->department->getDepartmentsIds($departments);
    $usersIds = $this->user->select('id')->whereIn('department_id', $departmentsIds)->get();
    $ids = [];
    foreach ($usersIds as $userId) {
      array_push($ids, $userId['id']);
    }
    $projects = $this->project->whereIn('manager_id', $ids);

    if ($search !== null) $projects = $projects->search($search);
    if ($active !== null) $projects = $projects->where('active', $active);
    if ($openStatus !== null) $projects = $projects->where('open_status', $openStatus);
    if ($closeStatus !== null) $projects = $projects->where('close_status', $closeStatus);

    $projects = $projects->paginated();
    return ProjectResource::collection($projects);
  }

  /**
   * Get id and name of active (opening) projects by manager_id
   */
  public function getActiveProjectsByManagerId(Request $request)
  {
    $projects = Project::select('id', 'name')
      ->where('manager_id', $request->manager)
      ->where('active', 1)->get();
    return $projects;
  }

  /**
   * Get project by id
   */
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
        'project' => new ProjectResource($project)
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
      $project->close_status = $request->close_status;
      $project->open_status = $request->open_status;

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

  public function changeProjectManager(Request $request, $id)
  {
    try {
      $project = $this->projectRepository->find($id);
      $project->manager_id = $request->manager_id;
      $project->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Thay đổi quản lý dự án thành công!',
        'project' => new ProjectResource($project)
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function closeOrReopenProject(Request $request, $id)
  {
    try {
      $project = $this->projectRepository->find($id);
      $project->close_status = $request->close_status;
      $project->open_status = $request->open_status;
      $project->active = $request->active;

      $project->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Cập nhật thành công!',
        'project' => new ProjectResource($project)
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }
}
