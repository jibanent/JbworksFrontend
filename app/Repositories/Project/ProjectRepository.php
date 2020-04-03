<?php

namespace App\Repositories\Project;

use App\Models\Project;
use App\Repositories\BaseRepository;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
  public function __construct(Project $project)
  {
    parent::__construct($project);
  }
}
