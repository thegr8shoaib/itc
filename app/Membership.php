<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $guarded = [];
    public function plan()
    {
      return $this->belongsTo('App\Plan');
    }
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function isValid()
    {
      if (!$this->end_at->isPast()) {
        return true;
      }
      return false;
    }
    

    protected $dates = ['start_at', 'end_at'];

}
