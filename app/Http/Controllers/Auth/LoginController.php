<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class LoginController extends Controller
{
    public function indexAdmin(){
        $admin = Admin::all();
        return response()->json($admin);
    }
    public function indexUser(){
        $user = User::all();
        return response()->json($user);
    }

    public function getUserById($id) {
        $user = User::find($id);

        return response()->json($user);
    }

    public function updateUser(Request $request, $id) {
        $user = User::find($id);
        try {
            $user->update([
                "fullname" => $request->fullname,
                "email" => $request->email,
                "phone" => $request->phone,
                "gender" => $request->gender,
                "birthday" => Carbon::parse($request->birthday)->format('Y/m/d'),
            ]);

            
        } catch (\Throwable $th) {
            dd($th);
        }
        

    }

    public function storeUser(RegisterUserRequest $request)
    {
        // dd($request->fullname);
        $create = User::create([
            "fullname" => $request->fullname,
            "avatar" => 'test',
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "phone" => $request->phone,
            "gender" => $request->gender,
            "birthday" => Carbon::parse($request->birthday)->format('Y/m/d'),
            "provider_id" => 1,
            "provider" => 3,
            "point" => 3,
        ]);
        return response()->json(['mess' => 'Đăng ký thành công!!']); 
    }

    public function storeAdmin(RegisterAdminRequest $request)
    {
        // dd($request->fullname);
        $create = Admin::create([
            "fullname" => $request->fullname,
            "avatar" => 'test',
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "phone" => $request->phone,
            "gender" => $request->gender,
            "birthday" => Carbon::parse($request->birthday)->format('Y/m/d'),
        ]);
        return response()->json(['mess' => 'Thêm tài khoản thành công!!']); 
    }
}
