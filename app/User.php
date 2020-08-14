<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'code', 'active', 'profil', 'ktp', 'provinsi', 'kabupaten', 'kecamatan', 'bank', 'no_rek',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_admin()
    {
        if($this->admin){
            return true;
        }
        return false;
    }

    public function prop(){
        return $this->belongsTo('App\Properti');
    }

    public function booking(){
        return $this->belongsTo('App\Pesanan');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'from');
    }
}
