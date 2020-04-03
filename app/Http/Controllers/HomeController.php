<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\Properti;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()){
            $data = Properti::where('id_user', '!=', Auth::user()->id)->orderBy('id', 'desc')->paginate(3);
            return view('utama', compact('data'));
            
        }else {
            $data = Properti::orderBy('id', 'desc')->paginate(3);
            return view('utama', compact('data'));
        }
    }

    public function iklan(Request $requset)
    {
        if(Auth::check()){
            if((Auth::user()->provinsi == null || Properti::where('provinsi', '!=', Auth::user()->provinsi))){
                $data = Properti::where('id_user', '!=', Auth::user()->id)->orderBy('id', 'desc')->paginate(3);
                return view('properties', compact('data'));

            }else if((Auth::user()->provinsi != null)){
                $data = Properti::where('provinsi', '=', Auth::user()->provinsi)->where('id_user', '!=', Auth::user()->id)->orderBy('id', 'desc')->paginate(3);
                return view('properties', compact('data'));

            }
        }else {
            $data = Properti::orderBy('id', 'desc')->paginate(3);
            return view('properties', compact('data'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Properti  $properti
     * @return \Illuminate\Http\Response
     */
    public function lihat($id)
    {
        $data = Properti::where('id', $id)->get();
        $iklan = Properti::find($id)->iklan;
        return view('detail', compact('data', 'iklan'));
        //    return $data;
    }

    public function pesanan(Request $request, $id){
        // $data = Properti::where('id',$request->id)->first();
        // $data = Properti::where('id', $id)->get();
        $iklan = Properti::find($id)->iklan;
        $iklan->status = $request->status;

        $pesanan = new Pesanan();
        $pesanan->id_pemesan = $request->id_pemesan;
        $pesanan->id_prop = $request->id_prop;

        $iklan->save();
        $pesanan->save();
        // dd($pesanan);
        return back();
    }
    
}
