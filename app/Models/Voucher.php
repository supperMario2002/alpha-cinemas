<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'vouchers';

    protected $fillable = ['name', 'quatity', 'discount', 'date_start', 'date_end'];

    public $timestamps = false;

    public function tickets(){
        return $this->hasMany(Ticket::class, 'voucher_id', 'id');
    }
}
