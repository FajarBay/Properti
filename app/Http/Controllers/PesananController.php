<?php

namespace App\Http\Controllers;

use App\Iklan;
use App\Pesanan;
use App\Properti;
use App\Transaksi;
use App\Bukti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Iklan::where('book', '1')->get();
        $iklan = $status->pluck('id_prop');
        // $data = Properti::where('id', '=', $iklan->all())get();  
        // $properti = $data->pluck('id');
        // dd($data);
        $pesanan = Pesanan::whereIn('id_prop', $iklan->all())->where('id_user', '=', Auth::user()->id)->get();
        // dd($pesanan);

        return view('customer.grafik', compact('pesanan'));
    }

    public function bayar(Request $request, $id){
        $bayar = new Transaksi();

        $iklan = Properti::find($id)->iklan;
        $iklan->transaksi = 1;

        $bayar->id_prop = $request->id_prop;
        $bayar->id_user = $request->id_user;
        $bayar->id_penjual = $request->id_penjual;
        $bayar->invoice = $request->invoice;
        $bayar->konf_penjual = $request->konf_penjual;
        $bayar->konf_admin = $request->konf_admin;

        $iklan->save();
        $bayar->save();

        return view('customer.pembayaran', compact('bayar'));
        // dd($bayar);
    }

    public function bukti(Request $request, $id){
        $bukti = new Bukti();

        $iklan = Transaksi::find($id)->proper->iklan;
        $iklan->status = 1;
        $iklan->book = 2;

        $bukti->nominal = $request->nominal;
        $bukti->id_transaksi = $request->id_transaksi;
        $buktiName = 'bukti'.time().'.'.request()->bukti->getClientOriginalExtension();
        $request->bukti->move('bukti',$buktiName);
        $bukti->bukti = $buktiName;
        $bukti->catatan = $request->catatan;

        $iklan->save();
        $bukti->save();
        return redirect('/pembelian');
    }

    public function pembelian(){
        $status = Iklan::where('book', '2')->get();
        $iklan = $status->pluck('id_prop');
        // $data = Properti::where('id', '=', $iklan->all())get();  
        // $properti = $data->pluck('id');
        // dd($data);
        $pembelian = Transaksi::whereIn('id_prop', $iklan->all())->where('id_user', '=', Auth::user()->id)->get();
        // dd($pembelian);
        // $bayar = Transaksi::whereIn('id_prop', $iklan->all())->where('id_user', '=', Auth::user()->id)->sum('nominal');

        return view('customer.pembelian', compact('pembelian'));
    }

    public function penjualan(){
        $status = Iklan::where('status', '1')->get();
        $iklan = $status->pluck('id_prop');
        // $user = $status->pluck('id_user');
        // $data = Properti::where('id', '=', $iklan->all())->get();  

        $penjualan = Transaksi::where('id_penjual', '=', Auth::user()->id)->where('id_prop', '=', $iklan->all())->get();
        // dd($penjualan);

        return view('customer.penjualan', compact('penjualan'));
    }

    public function verifikasiPenjualan($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->konf_penjual = 1;
        $transaksi->save();
        return back();

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
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $properti = Properti::where('id', $id)->orderBy('id', 'desc')->get();
        $user = Properti::find($id)->user;
        // $trans = Properti::find($id)->trans;

        // dd($trans);
        return view('customer.detailPesanan', compact('properti'));
    }

    public function pembayaran($id){
        $bayar = Transaksi::where('id', $id)->first();
        return view('customer.pembayaran', compact('bayar'));
    }

    public function detailPembelian($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();
        return view('customer.detailPembelian', compact('transaksi'));
    }

    public function detailpenjualan($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();
        return view('customer.detailPenjualan', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
