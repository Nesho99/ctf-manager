<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prijava extends Model
{
    use HasFactory;


    protected $table = 'prijava';
    public $timestamps = false;


    protected $fillable=[
        'natjecanje_id',
        'user_id'
    ];
}
