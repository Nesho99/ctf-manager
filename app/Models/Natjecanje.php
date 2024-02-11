<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Natjecanje extends Model
{
    use HasFactory;

    protected $hidden = [
        'naslov',
        'opis',
        'pocetak',
        'kraj'
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'pocetak' => 'datetime',
        'kraj' => 'datetime'
        
        
    ];

    protected $guarded=[
        
    ];
}

