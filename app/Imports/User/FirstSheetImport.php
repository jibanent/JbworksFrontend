<?php

namespace App\Imports\User;

use App\Jobs\SendEmailJob;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class FirstSheetImport implements ToCollection, WithStartRow
{
  public function collection($rows)
  {
    $result = [];
    foreach ($rows as $row) {
      $password = Str::random(8);
      $user = User::where('email', $row[3])->first();
      $data = [
        'name'          => $row[1],
        'username'      => $row[2],
        'email'         => $row[3],
        'phone'         => $row[4],
        'position'      => $row[5],
        'department_id' => Department::where('name', $row[6])->first()->id,
      ];

      if (!$user) {
        $data['password'] = $password;
        $details['email'] = $row[3];
        dispatch(new SendEmailJob($details, [
          'name'      => $row[1],
          'email'     => $row[3],
          'password'  => $password
        ]));
      }

      $newUser = User::updateOrCreate(['email' => $row[3]], $data);
      $newUser->syncRoles($row[7]);
      array_push($result, $newUser);
    }
    return $result;
  }

  /**
   * @return int
   */
  public function startRow(): int
  {
    return 2;
  }
}
