<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class VerifyController extends Controller
{

    public function getVerify(){
        return view('verify');
    }
    public function postVerify(Request $request){
        if($user=User::where('code',$request->code)->first()){
            $user->active=1;
            $user->code=null;
            $user->save();
            Auth::login($user, true);
            return redirect('/utama')->withMessage('Akun anda sudah aktif');
        }
        else{
            return back()->withMessage('Kode yang anda masukan salah');
        }
    }
}
