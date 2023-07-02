<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminRequest;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function indexAdmin(){
        $admin = Admin::all();
        return response()->json($admin);
    }
    public function registerAdmin(RegisterAdminRequest $request){
        return response()->json($request);
    }

    public function store(RegisterAdminRequest $request)
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
