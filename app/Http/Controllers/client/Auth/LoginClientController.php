<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LoginClientController extends Controller
{

    public function login(Request $request)
    {
        try {

            $credentials = request(['email', 'password']); 
            if (Auth::guard('user')->attempt($credentials, true)) {
                /** @var \App\Models\User $user **/
                $user = Auth::guard('user')->user(); 
                $tokenResult = $user->createToken('userToken', ['user'])->plainTextToken;
                return response()->json([
                    'status_code' => 200,
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ]);
            }
            return response()->json([
                'status_code' => 500,
                'message' => 'Tài khoản không tồn tại'
            ]);

        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Tài khoản không tồn tại',
                'error' => $error,
            ]);
        }
    }

    public function getUser(Request $request){
        if(Auth::guard('user')->check()){ 
            $user =  $request->user();
            $user->avatar = asset(Storage::url($user->avatar));
            return response()->json([
                'status_code' => 200, 
                'user' => $user,
            ]);
        }
        return response()->json([
            'status_code' => 500, 
            'message' => $request,
        ]);
    }

    public function logout(Request $request){
        if(Auth::guard('user')->check()){ 
            $user =  $request->user();
            $user->tokens()->delete();
            Auth::guard('user')->logout();

            return response()->json([
                'status_code' => 200, 
                'message' => 'Đã đăng xuất',
            ]);
        }
        return response()->json([
            'status_code' => 500, 
            'message' => 'Lỗi',
        ]);
    }
    
    
}
