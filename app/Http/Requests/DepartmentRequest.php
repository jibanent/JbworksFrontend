<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
      'name' => 'required',
      'manager_id' => 'required|unique:departments,manager_id,' . $id,
    ];

    return $commun;
    if ($update) return $commun;

    return array_merge($commun, [
      'manager_id' => 'required|unique:departments'
    ]);
  }
}
