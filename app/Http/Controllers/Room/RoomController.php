<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function indexRoom()
    {   
        $room = Room::all();
        return response()->json($room);
    }

    public function createRoom(RoomRequest $request)
    {
        $create = Room::create([
            "name" => $request->name,
            "address" => $request->address,
        ]);
        return response()->json(['mess' => 'Thêm thành công!!']);
    }
}
