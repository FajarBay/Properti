<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('edit', compact('user'));
    }

    public function update(Request $request, User $user)
    { 
        $user = Auth::user();

        $image_name = $request->hidden_image;
        $image = $request->file('ktp');
        if($image != '')
        {
            $request->validate([
                'name'    =>  'required',
                'no_hp'     =>  'required',
                'provinsi'     =>  'required',
                'kabupaten'     =>  'required',
                'kecamatan'     =>  'required',
                'ktp'         =>  'image|max:2048'
            ]);
            $image_name = $user->id.'_ktp'. $image->getClientOriginalExtension();
            $image->move('ktp', $image_name);
        }else
        {
            $request->validate([
                'name'    =>  'required',
                'no_hp'     =>  'required',
                'provinsi'     =>  'required',
                'kabupaten'     =>  'required',
                'kecamatan'     =>  'required',
            ]);
        }
        $form_data = array(
            'name'       =>   $request->name,
            'no_hp'        =>   $request->no_hp,
            'provinsi'        =>   $request->provinsi,
            'kabupaten'        =>   $request->kabupaten,
            'kecamatan'        =>   $request->kecamatan,
            'ktp'            =>   $image_name
        );

        $user->update($form_data);
        // dd($user);
        return redirect('cek');

        //return back();
    }

    public function profil(){
        $user = User::where('id', '=', Auth::user()->id)->get();
        return view('profil', compact('user'));
    }


    public function avatar(Request $request){
        $request->validate([
            'ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_profil'.time().'.'.request()->profil->getClientOriginalExtension();
        $request->profil->move('profil',$avatarName);
        $user->profil = $avatarName;
        $user->save();
        // dd($user);
        return back();
    }
    
}
