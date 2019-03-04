<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
   protected $fillable = ['cont','user_id','movie_id'];

   public function movie()
   {
       return $this->belongsTo('App\Models\Movie','movie_id','id');
   }
   public function user()
   {
       return $this->belongsTo('App\Models\User','user_id','id');
   }
}
