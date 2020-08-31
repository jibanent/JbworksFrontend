<?php

namespace App\Http\Controllers\Api;

use App\Exports\Department\DepartmentsExport;
use App\Exports\User\UsersTemplateExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User as UserResource;
use App\Imports\User\FirstSheetImport;
use App\Imports\User\UsersImport;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
  protected $userRepository;
  protected $user;
  protected $department;
  protected $project;

  public function __construct(UserRepositoryInterface $userRepository, User $user, Department $department, Project $project)
  {
    $this->userRepository = $userRepository;
    $this->user = $user;
    $this->department = $department;
    $this->project = $project;
  }

  public function index(Request $request)
  {
    $search = $request->search;
    $users = $this->user->where('id', '<>', auth()->user()->id);
    if ($search !== null) $users = $users->search($search);
    $users = $users->orderBy('created_at', 'DESC')->paginated();
    $users = UserResource::collection($users);
    return $users;
  }

  public function getMyUsersByDepartment(Request $request)
  {
    $departmentId = $this->department->where('manager_id', auth()->user()->id)->first()->id;
    $search = $request->search;
    $departments = $this->department->with('subdepartments')->where('id', $departmentId)->first();
    $departmentIds = $this->department->getDepartmentsIds($departments);
    $users = $this->user->whereIn('department_id', $departmentIds)->where('id', '<>', auth()->user()->id);

    if ($search !== null) $users = $users->search($search);
    $users = $users->orderBy('created_at', 'DESC')->paginated();
    return UserResource::collection($users);
  }

  public function getUsersHasLeaderAndManagerRole(Request $request)
  {
    $search = $request->search;
    $users = User::whereHas('roles', function ($query) {
      $query->whereIn('name', ['leader', 'manager']);
    });
    if ($search !== null) $users = $users->search($search);
    $users = $users->orderBy('created_at', 'DESC')->paginated();
    return UserResource::collection($users);
  }

  public function getProjectParticipants(Request $request)
  {
    $project = Project::findOrFail($request->project);
    return response()->json([
      'manager' => new UserResource($project->manager),
      'members' => UserResource::collection($project->users)
    ]);
  }

  public function store(UserRequest $request)
  {
    DB::beginTransaction();
    try {
      $user = $this->userRepository->create($request->all());
      $user->assignRole($request->role);

      // $admins = User::all()->filter(function ($user) {
      //   return $user->hasRole('admin');
      // });

      // Notification::send($admins, new CreateUser($user));

      DB::commit();
      return response()->json([
        'status' => 'success',
        'message' => 'Thêm mới thành viên thành công!',
        'user' => new UserResource($user)
      ], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function update(Request $request, $id)
  {
    $userRequest = new UserRequest;
    $rule        = $userRequest->rules(true, $id);
    $validator   = Validator::make($request->all(), $rule);
    if ($validator->fails()) return response()->json($validator->errors(), 422);

    DB::beginTransaction();
    try {
      $user = $this->userRepository->update($id, $request->all());
      $user->syncRoles([$request->role]);
      DB::commit();
      return response()->json([
        'status' => 'success',
        'user' => new UserResource($user)
      ], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function updateMyProfile(Request $request)
  {
    $id = auth()->user()->id;
    // validate
    $userRequest = new UserRequest;
    $rule        = $userRequest->rules(true, $id);
    $validator   = Validator::make($request->all(), $rule);

    if ($validator->fails()) return response()->json($validator->errors(), 422);

    DB::beginTransaction();
    try {
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->position = $request->position;
      $user->birthday = $request->birthday;
      $user->phone = $request->phone;
      $user->address = $request->address;
      $user->avatar = $this->uploadMyAvatar($request, $id);

      $user->save();

      DB::commit();
      return response()->json([
        'status' => 'success',
        'user' => new UserResource($user)
      ], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function uploadMyAvatar(Request $request)
  {
    $id = auth()->user()->id;
    $filename = $this->moveAvatar($request->file('avatar'));
    $user = User::findOrFail($id);
    if ($filename !== null) {
      File::delete('images/avatar/' . $user->avatar);
    }
    return $filename ? $filename : $user->avatar;
  }

  private function moveAvatar($image)
  {
    if ($image) {
      $extension = $image->getClientOriginalExtension();
      $filename = uniqid() . '_' . time() . '.' . $extension;
      $image->move('images/avatar/', $filename);
      return $filename;
    }
  }

  public function destroy($id)
  {
    DB::beginTransaction();
    try {
      $departments = $this->department->select('manager_id')->get();
      $projects = $this->project->select('manager_id')->get();
      $departmentManagerIds = [];
      $projectDepartmentIds = [];
      foreach ($departments as  $value) {
        array_push($departmentManagerIds, $value->manager_id);
      }
      foreach ($projects as $value) {
        array_push($projectDepartmentIds, $value->manager_id);
      }
      if (in_array($id, $departmentManagerIds) || in_array($id, $projectDepartmentIds)) {
        return response()->json(['status' => 'warning', 'message' => 'Không được phép xóa thành viên này!'], 200);
      }

      $this->userRepository->delete($id);
      DB::commit();
      return response()->json(['status' => 'success', 'message' => 'Xóa thành viên thành công'], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function changePassword(Request $request)
  {

    $passwordRequest = new PasswordRequest;
    $rule        = $passwordRequest->rules();
    $validator   = Validator::make($request->all(), $rule);
    if ($validator->fails()) return response()->json($validator->errors(), 422);

    $currentPassword = auth()->user()->password;
    $userId = auth()->user()->id;
    if (Hash::check($request->current_password, $currentPassword)) {
      $user = User::findOrFail($userId);
      $user->password = bcrypt($request->new_password);
      $user->save();
      return response()->json(['status' => 'success', 'message' => 'Đổi mật khẩu thành công!']);
    } else {
      return response()->json(['current_password' => ['Please enter correct current password']], 422);
    }
  }

  public function downloadExcelTemplate(Request $request)
  {
    if ($request->lang === 'vi') {
      return response()->download(public_path('templates/excel/import_users_vi.xlsx'));
    }
    if ($request->lang === 'ja') {
      return response()->download(public_path('templates/excel/import_users_ja.xlsx'));
    }
  }

  public function import(Request $request)
  {
    $rows = Excel::toCollection(new UsersImport, $request->file('import_file'))->first();
    $firstSheetImport = new FirstSheetImport;
    $import = $firstSheetImport->collection($rows);

    if ($import['status'] === 'error') {
      return $import['errors'];
    } else {
      return UserResource::collection($import['result']);
    }
  }
}
