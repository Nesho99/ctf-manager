<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dokument extends Model
{
    use HasFactory;
     protected $table="dokument";
     public $timestamps = false;

     protected $fillable = [
        'ime'
    ];

    public function korisnik(): HasOne{
        return $this->hasOne(User::class);
    }

}
