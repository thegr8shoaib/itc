<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    protected $guarded = [];

    public function amountEarned()
    {
      return $this->hasMany('App\RefferAmountEarned');
    }
     

    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
