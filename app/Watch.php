<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    protected $guarded = [];

    public function video()
    {
      return $this->belongsTo('App\Video');
    }
}
