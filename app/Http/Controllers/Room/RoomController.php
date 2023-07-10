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

    public function getRoomById($id)
    {
        $room = Room::find($id);

        return response()->json($room);
    }

    public function updateRoom(Request $request, $id)
    {
        $room = Room::find($id);
        try {
            $room->update([
                "name" => $request->name,
                "address" => $request->address,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function deleteRoom($id)
    {
        $room = Room::find($id);
        try {
            $room->delete();

            return response()->json(['mess' => 'Xóa thành công!!']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
