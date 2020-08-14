<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    protected $guarded = [];

    public function transakasi(){
        return $this->hasOne('App\Transaksi');
    }
}
