<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\Properti;
use App\Kategori;
use App\Iklan;
use App\User;
use Illuminate\Http\Request;
// use Request;
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
        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
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
        $kat = Kategori::where('aktif', '1')->get();

        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
        if(Auth::check()){
            if((Auth::user()->provinsi == null || Properti::where('provinsi', '!=', Auth::user()->provinsi))){
                $data = Properti::where('id_user', '!=', Auth::user()->id)->orderBy('id', 'desc')->paginate(6);
                return view('properties', compact('data', 'kat'));

            }else if((Auth::user()->provinsi != null)){
                $data = Properti::where('provinsi', '=', Auth::user()->provinsi)->where('id_user', '!=', Auth::user()->id)->orderBy('id', 'desc')->paginate(6);
                return view('properties', compact('data', 'kat'));

            }
        }else {
            $data = Properti::orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
            // dd($sold);
        }
    }

    public function jakarta()
    {
        $kat = Kategori::where('aktif', '1')->get();

        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
        if(Auth::check()){
            $data = Properti::where('id_user', '!=', Auth::user()->id)->where('provinsi', '=', 'DKI JAKARTA')->orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
        }else {
            $data = Properti::where('provinsi', '=', 'DKI JAKARTA')->orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
            // dd($sold);
        }
    }

    public function bandung()
    {
        $kat = Kategori::where('aktif', '1')->get();

        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
        if(Auth::check()){
            $data = Properti::where('id_user', '!=', Auth::user()->id)->where('provinsi', '=', 'BANDUNG')->orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
        }else {
            $data = Properti::where('provinsi', '=', 'BANDUNG')->orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
            // dd($sold);
        }
    }

    public function jogja()
    {
        $kat = Kategori::where('aktif', '1')->get();

        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
        if(Auth::check()){
            $data = Properti::where('id_user', '!=', Auth::user()->id)->where('provinsi', '=', 'DI YOGYAKARTA')->orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
        }else {
            $data = Properti::where('provinsi', '=', 'DI YOGYAKARTA')->orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
            // dd($sold);
        }
    }

    public function semarang()
    {
        $kat = Kategori::where('aktif', '1')->get();

        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
        if(Auth::check()){
            $data = Properti::where('id_user', '!=', Auth::user()->id)->where('provinsi', '=', 'SEMARANG')->orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
        }else {
            $data = Properti::where('provinsi', '=', 'SEMARANG')->orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
            // dd($sold);
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
        $iklan->book = $request->book;

        $pesanan = new Pesanan();
        $pesanan->id_user = $request->id_user;
        $pesanan->id_prop = $request->id_prop;

        $iklan->save();
        $pesanan->save();
        // dd($pesanan);
        return back();
    }

    public function hapusPesanan($id){
        $iklan = Properti::find($id)->iklan;
        $iklan->book = 0;
        $iklan->save();
        return redirect('/pesanan');
    }

    public function cariUtama(Request $request){
        $kat = Kategori::where('aktif', '1')->get();

        $cari = $request->cari_properti;

        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
        if(Auth::check()){
            if((Auth::user()->provinsi == null || Properti::where('provinsi', '!=', Auth::user()->provinsi))){
                $data = Properti::where('id_user', '!=', Auth::user()->id)->where(function($q) use($cari){
                    $q->where('nama_prop', 'like', "%".$cari."%")->orWhere('provinsi', 'like', "%".$cari."%")
                    ->orWhere('kabupaten', 'like', "%".$cari."%")->orWhere('kecamatan', 'like', "%".$cari."%")
                    ->orWhere('alamat', 'like', "%".$cari."%");
                })->orderBy('id', 'desc')->paginate(6);

                return view('properties', compact('data', 'kat'));

            }else if((Auth::user()->provinsi != null)){
                $data = Properti::where('provinsi', '=', Auth::user()->provinsi)->where('id_user', '!=', Auth::user()->id)
                ->where(function($q) use($cari){
                    $q->where('nama_prop', 'like', "%".$cari."%")->orWhere('provinsi', 'like', "%".$cari."%")
                    ->orWhere('kabupaten', 'like', "%".$cari."%")->orWhere('kecamatan', 'like', "%".$cari."%")
                    ->orWhere('alamat', 'like', "%".$cari."%");
                })->orderBy('id', 'desc')->paginate(6);
                return view('properties', compact('data', 'kat'));

            }
        }else {
            $data = Properti::where('nama_prop', 'like', "%".$cari."%")
            ->orWhere('provinsi', 'like', "%".$cari."%")->orWhere('kabupaten', 'like', "%".$cari."%")
            ->orWhere('kecamatan', 'like', "%".$cari."%")->orWhere('alamat', 'like', "%".$cari."%")
            ->orderBy('id', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
            // dd($sold);
        }
    }

    public static function filter(Request $request){
        $kat = Kategori::where('aktif', '1')->get();

        $cari = $request->cari_properti;
        $kategori = $request->kategori;
        $jenis = $request->jenis;
        // $sort = $request->jenis;
        $nego = $request->nego;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        
        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
        if(Auth::check()){
            if((Auth::user()->provinsi == null || Properti::where('provinsi', '!=', Auth::user()->provinsi))){
                $prop = Properti::join('kategori', 'propertis.id_kat', '=', 'kategori.id')
                ->join('iklans', 'propertis.id', '=', 'iklans.id_prop')->where('iklans.id_user', '!=', Auth::user()->id);
                
                $data = $prop->where(function($q) use($cari, $kategori, $jenis, $nego, $min_price, $max_price){
                    if(!empty($cari)){
                        $q->where('nama_prop', 'like', "%".$cari."%")->orWhere('provinsi', 'like', "%".$cari."%")
                    ->orWhere('kabupaten', 'like', "%".$cari."%")->orWhere('kecamatan', 'like', "%".$cari."%")
                    ->orWhere('alamat', 'like', "%".$cari."%");
                    }
                    if(!empty($kategori)){
                        $q->where('kategori.id', '=', $kategori);
                    }

                    if(isset($jenis)){
                        $q->where('jenis', '=', $jenis);
                    }

                    if(isset($nego)){
                        $q->where('nego', '=', $nego);
                    }

                    if(!empty($min_price)){
                        $q->where('harga', '>=', $min_price);
                    }
                    
                    if(!empty($max_price)){
                        $q->where('harga', '<=', $max_price);
                    }
                
                })->orderBy('id', 'desc')->select('propertis.*', 'jenis', 'nego')->paginate(6);

                return view('properties', compact('data', 'kat'));
            }else if((Auth::user()->provinsi != null)){
                $prop = Properti::join('kategori', 'propertis.id_kat', '=', 'kategori.id')
                ->join('iklans', 'propertis.id', '=', 'iklans.id_prop')->where('provinsi', '=', Auth::user()->provinsi)->where('iklans.id_user', '!=', Auth::user()->id);
                
                $data = $prop->where(function($q) use($cari, $kategori, $jenis, $nego, $min_price, $max_price){
                    if(!empty($cari)){
                        $q->where('nama_prop', 'like', "%".$cari."%")->orWhere('provinsi', 'like', "%".$cari."%")
                    ->orWhere('kabupaten', 'like', "%".$cari."%")->orWhere('kecamatan', 'like', "%".$cari."%")
                    ->orWhere('alamat', 'like', "%".$cari."%");
                    }
                    if(!empty($kategori)){
                        $q->where('kategori.id', '=', $kategori);
                    }

                    if(isset($jenis)){
                        $q->where('jenis', '=', $jenis);
                    }

                    if(isset($nego)){
                        $q->where('nego', '=', $nego);
                    }

                    if(!empty($min_price)){
                        $q->where('harga', '>=', $min_price);
                    }
                    
                    if(!empty($max_price)){
                        $q->where('harga', '<=', $max_price);
                    }
                
                })->orderBy('id', 'desc')->select('propertis.*', 'jenis', 'nego')->paginate(6);

                return view('properties', compact('data', 'kat'));
            }else {
                $prop = Properti::join('kategori', 'propertis.id_kat', '=', 'kategori.id')
                ->join('iklans', 'propertis.id', '=', 'iklans.id_prop');
                
                $data = $prop->where(function($q) use($cari, $kategori, $jenis, $nego, $min_price, $max_price){
                    if(!empty($cari)){
                        $q->where('nama_prop', 'like', "%".$cari."%")->orWhere('provinsi', 'like', "%".$cari."%")
                    ->orWhere('kabupaten', 'like', "%".$cari."%")->orWhere('kecamatan', 'like', "%".$cari."%")
                    ->orWhere('alamat', 'like', "%".$cari."%");
                    }
                    if(!empty($kategori)){
                        $q->where('kategori.id', '=', $kategori);
                    }

                    if(isset($jenis)){
                        $q->where('jenis', '=', $jenis);
                    }

                    if(isset($nego)){
                        $q->where('nego', '=', $nego);
                    }

                    if(!empty($min_price)){
                        $q->where('harga', '>=', $min_price);
                    }
                    
                    if(!empty($max_price)){
                        $q->where('harga', '<=', $max_price);
                    }
                
                })->orderBy('id', 'desc')->select('propertis.*', 'jenis', 'nego')->paginate(6);

                return view('properties', compact('data', 'kat'));
            }
        }
    }

    public function terendah(){
        $kat = Kategori::where('aktif', '1')->get();

        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
        if(Auth::check()){
            if((Auth::user()->provinsi == null || Properti::where('provinsi', '!=', Auth::user()->provinsi))){
                $data = Properti::where('id_user', '!=', Auth::user()->id)->orderBy('harga', 'asc')->paginate(6);
                return view('properties', compact('data', 'kat'));

            }else if((Auth::user()->provinsi != null)){
                $data = Properti::where('provinsi', '=', Auth::user()->provinsi)->where('id_user', '!=', Auth::user()->id)->orderBy('harga', 'asc')->paginate(6);
                return view('properties', compact('data', 'kat'));

            }
        }else {
            $data = Properti::orderBy('harga', 'asc')->paginate(6);
            return view('properties', compact('data', 'kat'));
            // dd($sold);
        }
    }

    public function tertinggi(){
        $kat = Kategori::where('aktif', '1')->get();

        $sold = Iklan::where('sold', '1')->get();
        $iklan = $sold->pluck('id_prop');
        if(Auth::check()){
            if((Auth::user()->provinsi == null || Properti::where('provinsi', '!=', Auth::user()->provinsi))){
                $data = Properti::where('id_user', '!=', Auth::user()->id)->orderBy('harga', 'desc')->paginate(6);
                return view('properties', compact('data', 'kat'));

            }else if((Auth::user()->provinsi != null)){
                $data = Properti::where('provinsi', '=', Auth::user()->provinsi)->where('id_user', '!=', Auth::user()->id)->orderBy('harga', 'desc')->paginate(6);
                return view('properties', compact('data', 'kat'));

            }
        }else {
            $data = Properti::orderBy('harga', 'desc')->paginate(6);
            return view('properties', compact('data', 'kat'));
            // dd($sold);
        }
    }

    // $data = Properti::join('kategori', 'propertis.id_kat', '=', 'kategori.id')
    //     ->join('iklans', 'propertis.id', '=', 'iklans.id_prop')->newQuery();
    //         if(!empty($cari)){
    //             $data->where('nama_prop', 'like', "%".$cari."%")->orWhere('provinsi', 'like', "%".$cari."%")
    //                 ->orWhere('kabupaten', 'like', "%".$cari."%")->orWhere('kecamatan', 'like', "%".$cari."%")
    //                 ->orWhere('alamat', 'like', "%".$cari."%")->orderBy('id', 'desc');
    //         }
    //         if(!empty($kategori)){
    //             $data->where('kategori.id', '=', $kategori)->orderBy('id', 'desc');
    //         }

    //         if(isset($jenis)){
    //             $data->where('jenis', '=', $jenis)->orderBy('id', 'desc');
    //         }

    //         if(isset($nego)){
    //             $data->where('nego', '=', $nego)->orderBy('id', 'desc');
    //         }

    //         if($sort === '1'){
    //             $data->orderBy('id', 'desc');
    //         }
    //         if($sort === '2'){
    //             $data->orderBy('harga', 'asc');
    //         }
    //         if($sort === '3'){
    //             $data->orderBy('harga', 'desc');
    //         }

    //         if(!empty($min_price)){
    //             $data->where('harga', '>=', $min_price)->orderBy('id', 'desc');
    //         }
            
    //         if(!empty($max_price)){
    //             $data->where('harga', '<=', $max_price)->orderBy('id', 'desc');
    //         }
        
    //     return $data->select('propertis.*', 'jenis', 'nego')->paginate(6);
    
}
