<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    public function registerAdmin(RegisterAdminRequest $request){
        return response()->json($request);
    }

    public function store(RegisterAdminRequest $request)
    {
        // dd($request);
        $create = Admin::create([
            "fullname" => $request->fullname,
            "avatar" => 'test',
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "phone" => $request->phone,
            "gender" => $request->gender,
            "birthday" => $request->birthday,
            "deleted_at" => $request->deleted_at,
        ]);
        return response()->json($request); 
    }
}
