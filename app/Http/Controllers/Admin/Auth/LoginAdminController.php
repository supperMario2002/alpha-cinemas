<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginAdminController extends Controller
{
    public function login(Request $request){
        try { 
  
            // $credentials = request(['email', 'password']);

            // if (!Auth::attempt($credentials)) {
            //     return response()->json([
            //         'status_code' => 500,
            //         'message' => 'Unauthorized'
            //     ]);
            // }

            $admin = Admin::where('email', $request->email)->first();

            if (!Hash::check($request->password, $admin->password, [])) {
                throw new \Exception('Error in Login');
            }

            $tokenResult = $admin->createToken('authToken')->plainTextToken;
            // Auth::guard('admin')->login($admin);

            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Tài khoản không tồn tại',
                'error' => $error,
            ]);
        }
    }
}
