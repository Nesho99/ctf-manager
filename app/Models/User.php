<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded=[
        'role'
    ];

    function zadatci(): HasManyThrough{
        return $this->hasManyThrough(Zadatak::class,Rijesenje::class,'user_id','id','id','zadatak_id');
    }

    function natjecanja(): HasManyThrough{
        return $this->hasManyThrough(Natjecanje::class,Prijava::class,'user_id','id','id','natjecanje_id');
    }


    function jeAdmin(){
       return  $this->role == 2;
    }
    public function rijesioZadatak($id){
        return $this->zadatci()
                    ->where('id', $id)
                    ->exists();
    }

    public function jePrijavljenNatjecanje($id){
        return $this->natjecanja()
                    ->where('id', $id)
                    ->exists();
    }
    

    


    
}
