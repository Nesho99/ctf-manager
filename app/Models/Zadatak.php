<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Zadatak extends Model
{
    use HasFactory;

    
    protected $table = 'zadatak';
    public $timestamps = false;


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
    public function rijesenja(): HasMany{
        return $this->hasMany(Rijesenje::class);
    }
    
    public function dokumenti(): HasMany{
        return $this->hasMany(Dokument::class);
    }

    

}
