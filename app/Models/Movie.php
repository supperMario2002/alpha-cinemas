<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'descrition',
        'release_date',
        'director',
        'running_time',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public $timestaps = true;
}
