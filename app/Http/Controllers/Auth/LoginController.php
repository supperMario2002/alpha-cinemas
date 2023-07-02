<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserCollection;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    public function registerAdmin(RegisterAdminRequest $request){
        return response()->json($request);
    }

    public function registerUser(RegisterUserRequest $request){
        return response()->json($request);
    }
    public function indexUser(){
        $user = User::all();
        return response()->json($user);
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
        return response()->json(['mess' => 'Thêm tài khoản thành công!!']); 
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
