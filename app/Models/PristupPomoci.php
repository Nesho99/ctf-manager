<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class PristupPomoci extends Model
{
    use HasFactory;

    
    protected $table = 'pristup_pomoci';
    public $timestamps = false;


    protected $fillable=[
        'naslov',
        'opis',
        'kategorija',
        'tezina',
        'bodovi',
        'natjecanje'
    ];

    public function natjecanje() : BelongsTo{
        return $this->belongsTo(Natjecanje::class);
    }
    public function rijesenja(): HasMany{
        return $this->hasMany(Rijesenje::class);
    }
    
    public function dokumenti(): HasMany{
        return $this->hasMany(Dokument::class);
    }

    

}
