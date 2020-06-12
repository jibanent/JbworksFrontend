<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
  /**
   * Create a new AuthController instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth:api', ['except' => ['login']]);
  }

  /**
   * Get a JWT via given credentials.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function login(LoginRequest $request)
  {
    $credentials = $request->all();
    if (!$token = auth()->attempt($credentials)) {
      return response()->json([
        'status' => 'error',
        'message' => 'Email hoặc mật khẩu không chính xác'
      ], 401);
    }

    return $this->respondWithToken($token);
  }

  /**
   * Get the authenticated User.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function me()
  {
    return response()->json($this->currentUser());
  }

  /**
   * Log the user out (Invalidate the token).
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout()
  {
    auth()->logout();

    return response()->json(['message' => 'Successfully logged out']);
  }

  /**
   * Refresh a token.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function refresh()
  {
    return $this->respondWithToken(auth()->refresh());
  }

  /**
   * Get the token array structure.
   *
   * @param  string $token
   *
   * @return \Illuminate\Http\JsonResponse
   */
  protected function respondWithToken($token)
  {
    $user = auth()->user();
    return response()->json([
      'status' => 'success',
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth()->factory()->getTTL() * 43200,
      'user' => $this->currentUser()
    ], 200);
  }

  protected function currentUser()
  {
    $user = auth()->user();
    return [
      'id'         => $user->id,
      'name'       => $user->name,
      'email'      => $user->email,
      'username'   => $user->username,
      'phone'      => $user->phone,
      'position'   => $user->position,
      'active'     => $user->active,
      'avatar'     => avatar($user->avatar),
      'created_at' => $user->created_at,
      'updated_at' => $user->updated_at,
      'roles'      => $user->getRoleNames(),
      'permissions' => $user->getPermissionsViaRoles()
    ];
  }
}
