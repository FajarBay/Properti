<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = [];

    public function proper(){
        return $this->belongsTo('App\Properti', 'id_prop');
    }

    public function penjual(){
        return $this->hasOne('App\User', 'id', 'id_penjual');
    }

    public function pembeli(){
        return $this->hasOne('App\User', 'id', 'id_user');
    }

    public function bukti(){
        return $this->belongsTo('App\Bukti');
    }
}
