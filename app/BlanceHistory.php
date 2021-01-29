<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlanceHistory extends Model
{
  protected $guarded = [];

  public function video()
  {
    return $this->belongsTo('App\Video');
  }
}
