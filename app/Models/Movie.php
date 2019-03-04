<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    protected $fillable = [
      'id','title','year','director','image'
    ];

    public function favorites()
    {
        return $this->belongsToMany('App\Models\User','favorites','movie_id','user_id');
    }

    public function moviesFavorites()
    {
        return $this->hasMany('App\Models\Favorite')
            ->select(DB::raw('user_id,movie_id , count() as qtd'))
            ->groupBy('movie_id')
            ->orderBy('movie_id','desc');
    }
}
