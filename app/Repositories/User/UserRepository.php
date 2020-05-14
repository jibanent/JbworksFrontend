<?php

namespace App\Repositories\User;

use App\Mail\SendAccount;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
  public function __construct(User $user)
  {
    parent::__construct($user);
  }

  public function create($data = [])
  {
    $password = Str::random(8);
    $this->sendInfoLoginToEmail($data, $password);
    return $this->model->create([
      'name'          => $data['name'],
      'username'      => $data['username'],
      'email'         => $data['email'],
      'phone'         => $data['phone'],
      'position'      => $data['position'],
      'department_id' => $data['department_id'],
      'password'      => bcrypt($password)
    ]);
  }

  private function sendInfoLoginToEmail($data, $password)
  {
    Mail::to($data['email'])->send(new SendAccount([
      'name'      => $data['name'],
      'email'     => $data['email'],
      'password'  => $password
    ]));
  }
}
