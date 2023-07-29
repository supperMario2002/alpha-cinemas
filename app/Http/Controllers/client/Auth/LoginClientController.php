<?php

namespace App\Http\Controllers\client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginClientController extends Controller
{

    public function login(Request $request)
    {
        try {

            $credentials = request(['email', 'password']);
            // dd($credentials);
            if (Auth::guard('user')->attempt($credentials)) {
                /** @var \App\Models\User $user **/
                $user = Auth::guard('user')->user();
                dd($user);
                $tokenResult = $user->createToken('userToken', ['user'])->plainTextToken;
                return response()->json([
                    'status_code' => 200,
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
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
    
}
