<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $guarded = [];
    
    public function properti(){
        return $this->hasOne('App\Properti', 'id', 'id_prop');
    }

    public function pemesan(){
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
