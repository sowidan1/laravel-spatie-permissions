<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('permission:get_profile_user')->only('getProfile');
        $this->middleware('permission:delete_profile_user')->only('deleteProfile');
    }

    public function createProfile(UserRegisterRequest $request) {
        $data = $request->validated();
        $user = User::create($data);

        $user_role = Role::where('name','user')->first();
        if($user_role){
            $user->assignRole($user_role);
        }

        $token = $user->createToken('app')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token'=>$token,
        ]);
    }

    public function getProfile() {
        $user = auth()->user();
        return response()->json([
            'user'=>$user
        ]);
    }
    public function deleteProfile() {
        $user = auth()->user();
        if($user) {
            $user->delete();
        }
        return response()->json([
            'done'
        ]);
    }
}
