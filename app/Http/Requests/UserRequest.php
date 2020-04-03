<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules($update = false, $id = null)
  {
    $commun = [
      'name'    => 'required',
      'email'   => 'required|email|unique:users,email,' . $id,
      'phone'   => 'nullable|min:10|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
      'role_id' => 'required'
    ];

    if ($update) return $commun;

    return array_merge($commun, [
      'email' => 'required|email|unique:users'
    ]);
  }
}
