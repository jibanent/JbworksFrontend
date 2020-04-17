<?php

namespace App\Repositories\Project;

use App\Models\Project;
use App\Repositories\BaseRepository;
use App\Http\Resources\Project as ProjectResource;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
  public function __construct(Project $project)
  {
    parent::__construct($project);
  }
  /**
   * Get my active projects
   */
  static public function getMyActiveProjects($userId)
  {
    $myProjects = Project::whereHas(
      'users',
      function ($query) use ($userId) {
        $query->where('user_id', $userId);
      }
    )->select('id', 'name')->where('active', 1)->get();
    return $myProjects;
  }

}
