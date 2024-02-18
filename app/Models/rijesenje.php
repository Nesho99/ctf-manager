<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rijesenje extends Model
{
    use HasFactory;

    protected $table = 'rjesenje';
    public $timestamps = false;


    protected $fillable = [
        'zadatak_id',
        'user_id'
    ];


}
