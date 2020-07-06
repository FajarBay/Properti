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
        $pesanan = Pesanan::whereIn('id_prop', $iklan->all())->where('id_user', '=', Auth::user()->id)->paginate(6);
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

    public function kirimLagi(Request $request){
        $bukti = new Bukti();

        $bukti->nominal = $request->nominal;
        $bukti->id_transaksi = $request->id_transaksi;
        $buktiName = 'bukti'.time().'.'.request()->bukti->getClientOriginalExtension();
        $request->bukti->move('bukti',$buktiName);
        $bukti->bukti = $buktiName;
        $bukti->catatan = $request->catatan;
        
        $bukti->save();
        return back();
    }

    public function pembelian(){
        $status = Iklan::where('book', '2')->get();
        $iklan = $status->pluck('id_prop');
        $pembelian = Transaksi::whereIn('id_prop', $iklan->all())->where('id_user', '=', Auth::user()->id)->orderBy('id', 'desc')->paginate(6);

        return view('customer.pembelian', compact('pembelian'));
    }

    public function penjualan(){
        $status = Iklan::where('status', '1')->get();
        $iklan = $status->pluck('id_prop');

        $penjualan = Transaksi::whereIn('id_prop', $iklan->all())->where('id_penjual', '=', Auth::user()->id)->orderBy('id', 'desc')->paginate(6);
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
        $trans = Properti::find($id)->trans;

        // dd($trans);
        return view('customer.detailPesanan', compact('properti', 'trans'));
    }

    public function pembayaranLagi($id){
        $bayar = Transaksi::where('id', $id)->first();
        // dd($bayar);
        return view('customer.pembayaran', compact('bayar'));
    }

    public function pembayaran(Request $request, $id){
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
    }

    public function detailPembelian($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();

        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->sum('nominal');
        
        $bukti = Bukti::where('id_transaksi', $trans->id)->get();
        // dd($nominal);

        return view('customer.detailPembelian', compact('transaksi', 'bukti', 'nominal'));
    }

    public function detailPenjualan($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();

        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->sum('nominal');
        
        $bukti = Bukti::where('id_transaksi', $trans->id)->get();
        // dd($data);
        return view('customer.detailPenjualan', compact('transaksi', 'bukti', 'nominal'));
    }

    public function invoice($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();

        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->sum('nominal');
        
        $bukti = Bukti::where('id_transaksi', $trans->id)->get();
        // dd($nominal);

        return view('invoice', compact('transaksi', 'bukti', 'nominal'));
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
