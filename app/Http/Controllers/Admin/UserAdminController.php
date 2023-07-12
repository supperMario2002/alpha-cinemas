<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterAdminRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Services\FileService;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UserAdminController extends Controller
{

    protected $file;
    public function __construct(FileService $file){
        $this->file = $file;
    }

    public function indexAdmin()
    {
        $admin = Admin::all();
        foreach ($admin as $item) {
            $item['avatar'] = asset(Storage::url($item->avatar));
        }
        return response()->json($admin);
    }
    public function getAdminById($id)
    {
        $admin = Admin::find($id);
        
        return response()->json($admin);
    }
    public function updateAdmin(Request $request, $id)
    {
        $user = Admin::find($id);
        try {
            $user->update([
                "fullname" => $request->fullname,
                "email" => $request->email,
                "phone" => $request->phone,
                "gender" => $request->gender,
                "birthday" => Carbon::parse($request->birthday)->format('Y/m/d'),
                "updated_at" =>Carbon::now(),
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function storeAdmin(RegisterAdminRequest $request)
    {
        if($request->hasFile('file')){
            $path = $this->file->uploadImage($request->avatar, 'avatar'); 
        }
        try {
            $create = Admin::create([
                "fullname" => $request->fullname,
                "avatar" => $path,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "phone" => $request->phone,
                "gender" => $request->gender,
                "birthday" => Carbon::parse($request->birthday)->format('Y/m/d'),
            ]);
            return response()->json(['mess' => 'Thêm tài khoản thành công!!']);
         }catch (\Throwable $th) {
            dd($th);
         }
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

    
}
