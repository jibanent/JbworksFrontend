<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Repositories\Project\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\Project as ProjectResource;

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
