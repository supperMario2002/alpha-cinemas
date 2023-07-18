<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Room; 
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(){

    }

    public function create(){
        $listMovie = Movie::get();
        $listRoom = Room::get();
        return response()->json(['listMovie' => $listMovie, 'listRoom' => $listRoom]);
    }

    public function store(Request $request){
        try {
            $create = Schedule::create([
                'movie_id' => $request->movie,
                'room_id' => $request->room,
                'showtime' => Carbon::parse($request->showtime)->format('Y/m/d H:m:s')
            ]);
            return response()->json(['mess' => 'Thêm thành công!']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
