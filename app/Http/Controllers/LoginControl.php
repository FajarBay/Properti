<?php

namespace App\Http\Controllers;

use Auth;

use App\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $requset)
    {

        if(Auth::attempt([
            'email' => $requset->email,
            'password' => $requset->password
        ]))
        {
            $user = User::where('email', $requset->email)->first();
            if($user->is_admin()){
                return redirect()->route('dashboard');
            }
            return redirect()->route('home');
        }
        return redirect()->back();
    }
}
