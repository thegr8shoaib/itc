<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $dates = ['date'];


    public function saleman()
    {
      return $this->belongsTo('App\Saleman');
    }

    public function orderItems()
    {
      return $this->hasMany('App\OrderItem');
    }

    public function totalAmount()
    {
      $totalAmount = 0;
      foreach ($this->orderItems as $item) {
        $totalAmount += $item->quantity * $item->salePrice;
      }
      return $totalAmount;
    }
}
