<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
   protected $fillable = ['count','user_id','movie_id'];

   public function movie()
   {
       return $this->belongsTo('App\Models\Movie','movie_id','id');
   }
}
