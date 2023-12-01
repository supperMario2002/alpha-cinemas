<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $fillable = ['use_point', 'seat_id', 'schedule_id', 'user_id', 'admin_id', 'voucher_id', 'created_at', 'updated_at'];

    public $timestamps = true;
    public function voucher(){
        return $this->belongsTo(Voucher::class, 'voucher_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id'. 'id');
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

    public function seat(){
        return $this->belongsTo(Seat::class,'seat_id', 'id');
    }
}
