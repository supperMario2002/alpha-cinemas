<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\SeatType;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index() {
        $seats = Seat::with('seatType')->get();
        return response()->json(['listSeat' => $seats]);

    }

    public function seatType(){
        $seatType = SeatType::get();
        return response()->json(['seatType' => $seatType]);
    }
}
