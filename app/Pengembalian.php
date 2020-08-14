<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    public function property(){
        return $this->hasOne('App\Properti', 'id', 'id_prop');
    }

    public function seller(){
        return $this->hasOne('App\User', 'id', 'id_penjual');
    }

    public function buyer(){
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
