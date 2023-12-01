<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    private $table = 'tickets';
    private $fillable = ['use_point', 'seat_id', 'schedule_id', 'user_id', 'admin_id', 'voucher_id', 'created_at', 'updated_at'];

    

}
