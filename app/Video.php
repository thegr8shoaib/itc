<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    public function isExpired()
    {
      if ($this->created_at->addHours(48)->isPast()) {
        return true;
      }
      return false;
    }
}
