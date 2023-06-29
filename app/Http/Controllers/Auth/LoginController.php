<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function registerAdmin(RegisterAdminRequest $request){
        return response()->json($request);
    }

    public function store(RegisterAdminRequest $request)
    {
        return response()->json($request); 
    }
}
