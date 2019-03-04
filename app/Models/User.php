<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'id','name', 'email', 'password','cpf','rg','title','rule'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\Models\Movie','favorites','user_id','movie_id');
    }


    public function moviesFavorites()
    {
        return $this->belongsToMany('App\Models\Movie')
                    ->select(DB::table('favorites')
                    ->raw('user_id, movie_id , count(1) as qtd'))
                    ->groupBy('movie_id')
                    ->orderBy('movie_id','desc');
    }

}
