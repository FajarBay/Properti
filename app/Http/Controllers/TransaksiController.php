<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Pengembalian;
use App\Iklan;
use App\Properti;
use App\Pesanan;
use App\Bukti;
use Eloquent;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function refund(){
        $iklan = Iklan::where('book', '1')->pluck('id');
        $trans = Transaksi::where('berhasil', '0')->pluck('id');
        $bukti = Bukti::whereIn('id_transaksi', $trans->all())->where('refund', '0')->value('id');
        $pembeli = Transaksi::whereIn('id_prop', $iklan->all())->where('id_user', '=', Auth::user()->id)
        ->where('berhasil', '0')->orderBy('id', 'desc')->paginate(6);
        $penjual = Transaksi::whereIn('id_prop', $iklan->all())->where('id_penjual', '=', Auth::user()->id)
        ->where('berhasil', '0')->orderBy('id', 'desc')->paginate(6);
        return view('customer.pengembalian', compact('pembeli', 'penjual', 'bukti'));
    }

    public function detailPengembalian($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();
        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->where('refund', '1')->sum('nominal');
        
        $bukti = Bukti::where('id_transaksi', $trans->id)->where('refund', '2')->get();
        $img = Bukti::where('id_transaksi', $trans->id)->where('refund', '1')->value('bukti');
        
        // dd($img);

        return view('customer.detailPengembalian', compact('transaksi', 'bukti', 'nominal', 'img'));
    }

    public function pengembalianLagi($id){
        $prop = Properti::where('id', $id)->first();
        $bayar = Transaksi::find($id);
        // $bayar = Transaksi::where('id_prop', $prop->id)->first();
        // $bayar = Pengembalian::where('id_prop', $prop->id)->first();
        return view('customer.klaimPengembalian', compact('bayar'));
    }

    public function kirim_refund(Request $request, $id){
        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $bukti = new Bukti();

        // $iklan = Transaksi::find($id)->proper->iklan;
        // $iklan->transaksi = 2;
        // $iklan->book = 2;

        $bukti->nominal = $request->nominal;
        $bukti->id_transaksi = $request->id_transaksi;
        $buktiName = 'bukti'.time().'.'.request()->bukti->getClientOriginalExtension();
        $request->bukti->move('bukti',$buktiName);
        $bukti->bukti = $buktiName;
        $bukti->catatan = $request->catatan;
        $bukti->refund = $request->refund;
        $bukti->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return redirect('/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
