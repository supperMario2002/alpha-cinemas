<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterAdminRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;

class UserAdminController extends Controller
{

    public function indexAdmin()
    {
        $admin = Admin::all();
        return response()->json($admin);
    }
    public function indexUser()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function getUserById($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function getAdminById($id)
    {
        $admin = Admin::find($id);

        return response()->json($admin);
    }

    public function updateUser(Request $request, $id)
    {
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
        $create = User::create([
            "fullname" => $request->fullname,
            "avatar" => 'test',
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "phone" => $request->phone,
            "gender" => $request->gender,
            "birthday" => Carbon::parse($request->birthday)->format('Y/m/d'),
        ]);
        return response()->json(['mess' => 'Đăng ký thành công!!']);
    }

    public function updateAdmin(Request $request, $id)
    {
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

    public function storeAdmin(RegisterAdminRequest $request)
    {
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