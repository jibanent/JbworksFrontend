<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
  public function rules($update = false, $updateDepartmentId = false)
  {
    $commun = [
      'name'          => 'required',
      'manager_id'    => 'required',
      'department_id' => 'required',
      'finish_date'   => 'nullable|after:start_date'
    ];
    if ($update) $commun = [
      'name' => 'required',
    ];
    if ($updateDepartmentId) $commun = [
      'department_id' => 'required',
    ];
    return $commun;
  }
}
