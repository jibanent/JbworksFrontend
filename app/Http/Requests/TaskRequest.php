<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
      'name'        => 'required',
      'assigned_to' => 'required',
      'project_id'  => 'required',
    ];
    if ($update) $commun = [
      'name'        => 'required',
    ];

    return $commun;
  }
}
