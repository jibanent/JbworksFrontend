<?php

namespace App\Imports\User;

use App\Jobs\SendEmailJob;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class FirstSheetImport implements ToCollection, WithStartRow
{
  public function collection($rows)
  {
    DB::beginTransaction();
    try {
      $errors = [];
      $result = [];
      foreach ($rows as $key => $row) {

        $user = User::where('email', $row[3])->first();
        $validator = Validator::make(
          $row->toArray(),
          $this->rules($user ? $user->id : null),
          $this->messages(),
          $this->attributes()
        );

        if (!$validator->fails()) {
          $password = Str::random(8);
          $data = [
            'name'          => $row[1],
            'username'      => $row[2],
            'email'         => $row[3],
            'birthday'      => $row[4] ? Carbon::parse($row[4])->format('Y-m-d') : null,
            'phone'         => $row[5],
            'address'       => $row[6],
            'position'      => $row[7],
            'department_id' => Department::where('name', $row[8])->first()->id,
          ];

          if (!$user) {
            $data['password'] = bcrypt($password);
            $details['email'] = $row[3];
            dispatch(new SendEmailJob($details, [
              'name'      => $row[1],
              'email'     => $row[3],
              'password'  => $password
            ]));
          }

          $newUser = User::updateOrCreate(['email' => $row[3]], $data);
          $newUser->syncRoles($row[9]);
          array_push($result, $newUser);
        } else {
          $errors[$key] = $validator->errors()->all();
        }
      }
      DB::commit();

      if (count($errors)) {
        return [
          'status' => 'error',
          'errors' => $errors,
        ];
      } else {
        return [
          'status' => 'success',
          'result' => $result
        ];
      }
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  /**
   * @return int
   */
  public function startRow(): int
  {
    return 2;
  }

  public function rules($id = null): array
  {
    return [
      '0' => 'nullable',
      '1' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
      '2' => 'sometimes|required|string|max:255|alpha_dash|unique:users,username,' . $id,
      '3' => 'sometimes|required|email|unique:users,email,' . $id,
      '4' => 'nullable|date',
      '5' => 'nullable|min:10|max:15|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users, phone,' . $id,
      '6' => 'nullable',
      '7' => 'nullable',
      '8' => 'required',
      '9' => 'required',
    ];
  }

  public function attributes(): array
  {
    return [
      '1' => 'name',
      '2' => 'username',
      '3' => 'email',
      '4' => 'birthday',
      '5' => 'phone number',
      '6' => 'address',
      '7' => 'position',
      '8' => 'department',
      '9' => 'role',
    ];
  }

  public function messages(): array
  {
    return [];
  }
}
