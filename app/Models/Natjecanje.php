<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Zadatak;

class Natjecanje extends Model
{
    use HasFactory;


    protected $table = 'natjecanje';
    public $timestamps = false;
    protected $fillable=[
        'naslov',
        'opis',
        'pocetak',
        'kraj'
    ];

    protected $hidden = [
       
        
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

    public function zadatci(): HasMany{

        return $this->HasMany(Zadatak::class);

    }


    
}

