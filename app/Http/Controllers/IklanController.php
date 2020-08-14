<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iklan;
use App\Properti;
use Illuminate\Support\Facades\Auth;

class IklanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index(Request $request)
    {
        $request->session()->forget('iklan');

        $products = Iklan::all();
        $data = Properti::where('id', '=', Auth::user()->id)->get();

        return view('properti.index',compact('products', 'data'));
    }

    public function CreateIklan(Request $request)
    {
        $iklan = $request->session()->get('iklan');

        return view('customer.tambah5',compact('iklan'));
    }

    public function PostIklan(Request $request)
    {
        $validatedData = $request->validate([
            'id_prop' => 'required',
            'id_user' => 'required',
            'jenis' => 'required',
            'nego' => 'required',
            'sold' => 'required',
            'status' => 'required',
            'dilihat' => 'required',
            'transaksi' => 'required',
        ]);
        if(empty($request->session()->get('iklan'))){
            $iklan = new Iklan();
            $iklan->fill($validatedData);
            $request->session()->put('iklan', $iklan);
        }else{
            $iklan = $request->session()->get('iklan');
            $iklan->fill($validatedData);
            $request->session()->put('iklan', $iklan);
        }
        
        $iklan->save();
        // dd($iklan);
        return redirect('/iklan');
    }
}
