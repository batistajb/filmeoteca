<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
      'id', 'phone','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
