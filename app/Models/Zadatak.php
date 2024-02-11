<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Zadatak extends Model
{
    use HasFactory;

    protected $fillable=[
        'naslov',
        'opis',
        'kategorija',
        'tezina',
        'bodovi',
        'natjecanje'
    ];

    public function natecanje() : BelongsTo{
        return $this->belongsTo(Natjecanje::class);
    }

    

}
