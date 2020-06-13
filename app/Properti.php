<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    protected $guarded = [];

    public function iklan(){
        return $this->hasOne('App\Iklan', 'id_prop');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'id_user');
    }

    public function kategori(){
        return $this->hasOne('App\Kategori', 'id', 'id_kat');
    }

    public function pesanan(){
        return $this->belongsTo('App\Pesanan');
    }
    
    public function trans(){
        return $this->belongsTo('App\Transaksi', 'id', 'id_prop');
    }
}
