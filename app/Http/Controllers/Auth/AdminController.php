<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function __construct() {
        $this->middleware('permission:get_profile_admin')->only('getProfile');
      //  $this->middleware('permission:delete_profile_admin')->only('deleteProfile');
    }


    public function createProfile(AdminRegisterRequest $request) {
        $data = $request->validated();
        $user = Admin::create($data);
        $token = $user->createToken('app')->plainTextToken;
        $user_role = Role::where('name','admin')->first();
        if($user_role){
            $user->assignRole($user_role);
        }
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
