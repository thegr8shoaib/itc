<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    public function product()
    {
      return $this->hasOne('App\Product', 'id', 'productId');
    }
}
