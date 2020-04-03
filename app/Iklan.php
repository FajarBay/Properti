<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $guarded = [];

    public function myProp()
    {
        return $this->belongsTo('App\Properti');
    }
}
