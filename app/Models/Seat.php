<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $table = 'seats';

    protected $fillable = [
        "name",
        "type_seat",
    ];

    public function seatType(){
        return $this->belongsTo(SeatType::class, "type_seat","id", "seat_type");
    }

    public function ticket(){
        return $this->hasOne(Ticket::class, 'seat_id','id');
    }
}
