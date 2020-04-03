<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
  public function __construct(User $user)
  {
    parent::__construct($user);
  }

  public function create($data = [])
  {
    return $this->model->create([
      'name'          => $data['name'],
      'email'         => $data['email'],
      'phone'         => $data['phone'],
      'position'      => $data['position'],
      'department_id' => $data['department_id'],
      'password'      => bcrypt($data['phone'])
    ]);
  }
}
