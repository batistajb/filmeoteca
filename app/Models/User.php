<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

}
