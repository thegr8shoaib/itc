<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];

    public function perAdPrice()
    {
      return round($this->totalReturn / 300,2);
    }
}
