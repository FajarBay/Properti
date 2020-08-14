<?php

namespace App\Http\Controllers;

use App\Iklan;
use App\Pesanan;
use App\Properti;
use App\Transaksi;
use App\Bukti;
use App\Pengembalian;
use App\Mail\NotifyMail;
use App\Mail\RefundMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

class PesananController extends Controller
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
        $status = Iklan::where('book', '1')->get();
        $iklan = $status->pluck('id_prop');
        $pesanan = Pesanan::whereIn('id_prop', $iklan->all())->where('id_user', '=', Auth::user()->id)
        ->where('is_delete', '0')->orderBy('id', 'desc')->paginate(6);

        return view('customer.pesanan', compact('pesanan'));
    }

    public function bayar(Request $request, $id){
        $bayar = new Transaksi();

        $iklan = Properti::find($id)->iklan;
        $iklan->transaksi = 1;

        $bayar->id_prop = $request->id_prop;
        $bayar->id_user = $request->id_user;
        $bayar->id_penjual = $request->id_penjual;
        $bayar->invoice = $request->invoice;
        $bayar->konf_user = $request->konf_user;
        $bayar->konf_admin = $request->konf_admin;

        $iklan->save();
        $bayar->save();

        return view('customer.pembayaran', compact('bayar'));
        // dd($bayar);
    }

    public function bukti(Request $request, $id){
        $bukti = new Bukti();

        $trans = Transaksi::find($id);
        $iklan = Transaksi::find($id)->proper->iklan;
        $iklan->sold = 2;
        $email = Transaksi::find($id)->penjual->email;
        // dd($email);

        $id_prop = Transaksi::find($id)->proper;
        $pesanan1 = Pesanan::where('id_prop', $id_prop->id)->where('id_user', '!=', Auth::user()->id)->first();
        $pesanan2 = Pesanan::where('id_prop', $id_prop->id)->where('id_user', '=', Auth::user()->id)->where('bayar', '1')->first();
        if($pesanan2 != null){
            $bukti->nominal = $request->nominal;
            $bukti->id_transaksi = $request->id_transaksi;
            $buktiName = 'bukti'.time().'.'.request()->bukti->getClientOriginalExtension();
            $request->bukti->move('bukti',$buktiName);
            $bukti->bukti = $buktiName;
            $bukti->catatan = $request->catatan;
            $bukti->refund = 1;
            $trans->berhasil = 0;
            $trans->save();
            $iklan->save();
            $bukti->save();

            Mail::to($email)->send(new RefundMail());

            return redirect('/pesanan')->with(['warning' => 'Iklan ini sudah terjual kepada orang lain, transaksi anda akan masuk ke menu Pengembalian.']);
        }else if($pesanan1 != null){
            $pesanan1->bayar = 1;
            $bukti->nominal = $request->nominal;
            $bukti->id_transaksi = $request->id_transaksi;
            $buktiName = 'bukti'.time().'.'.request()->bukti->getClientOriginalExtension();
            $request->bukti->move('bukti',$buktiName);
            $bukti->bukti = $buktiName;
            $bukti->catatan = $request->catatan;
            $bukti->refund = 0;
            $trans->berhasil = 1;
            $pesanan1->save();
            $trans->save();
            $iklan->save();
            $bukti->save();

            Mail::to($email)->send(new NotifyMail());

            return redirect('/pesanan')->with(['success' => 'Pembayaran anda berhasil']);
        }else{
            $bukti->nominal = $request->nominal;
            $bukti->id_transaksi = $request->id_transaksi;
            $buktiName = 'bukti'.time().'.'.request()->bukti->getClientOriginalExtension();
            $request->bukti->move('bukti',$buktiName);
            $bukti->bukti = $buktiName;
            $bukti->catatan = $request->catatan;
            $bukti->refund = $request->refund;
            $trans->berhasil = $request->berhasil;
            $trans->save();
            $iklan->save();
            $bukti->save();
            Mail::to($email)->send(new NotifyMail());
            return redirect('/pesanan')->with(['success' => 'Pembayaran anda berhasil']);
        }
        // return redirect('/pesanan')->withMessage('Kode yang anda masukan salah');
    }

    public function kirimLagi(Request $request, $id){
        $bukti = new Bukti();

        $trans = Transaksi::where('id', $id)->first();
        $temp = $trans->berhasil;
        // dd($trans->berhasil);
        if($temp == 1){
            $bukti->nominal = $request->nominal;
            $bukti->id_transaksi = $request->id_transaksi;
            $buktiName = 'bukti'.time().'.'.request()->bukti->getClientOriginalExtension();
            $request->bukti->move('bukti',$buktiName);
            $bukti->bukti = $buktiName;
            $bukti->catatan = $request->catatan;
            $bukti->refund = 0;
        }else if ($temp == 0) {
            $bukti->nominal = $request->nominal;
            $bukti->id_transaksi = $request->id_transaksi;
            $buktiName = 'bukti'.time().'.'.request()->bukti->getClientOriginalExtension();
            $request->bukti->move('bukti',$buktiName);
            $bukti->bukti = $buktiName;
            $bukti->catatan = $request->catatan;
            $bukti->refund = 2;
        }
        
        
        $bukti->save();
        return back();
    }

    public function pembelian(){
        $status = Iklan::where('book', '1')->get();
        $iklan = $status->pluck('id_prop');
        $pembelian = Transaksi::whereIn('id_prop', $iklan->all())->where('id_user', '=', Auth::user()->id)->where('berhasil', '1')->orderBy('id', 'desc')->paginate(6);

        return view('customer.pembelian', compact('pembelian'));
    }

    public function penjualan(){
        $status = Iklan::where('book', '1')->get();
        $iklan = $status->pluck('id_prop');

        $penjualan = Transaksi::whereIn('id_prop', $iklan->all())->where('id_penjual', '=', Auth::user()->id)->where('berhasil', '1')->orderBy('id', 'desc')->paginate(6);
        // dd($penjualan);

        return view('customer.penjualan', compact('penjualan'));
    }

    public function verifikasiPenjualan($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->konf_user = 1;
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
        $properti = Pesanan::where('id', $id)->get();
        $id_prop = Pesanan::where('id', $id)->value('id_prop');
        $trans = Transaksi::where('id_prop', $id_prop)->where('id_user', Auth::user()->id)->where('berhasil', '1')->value('id');
        $bukti = Bukti::where('id_transaksi', $trans)->first();
        // dd($id_prop);
        return view('customer.detailPesanan', compact('properti', 'trans', 'bukti'));
    }

    public function show1($id)
    {
        $properti = Pesanan::where('id', $id)->get();
        $id_prop = Pesanan::where('id', $id)->value('id_prop');
        $trans = Transaksi::where('id_prop', $id_prop)->where('id_user', Auth::user()->id)->where('berhasil', '0')->value('id');
        $bukti = Bukti::where('id_transaksi', $trans)->first();

        // dd($trans);
        return view('customer.detailTerjual', compact('properti', 'trans', 'bukti'));
    }

    public function pembayaranLagi($id){
        $prop = Properti::where('id', $id)->first();
        $bayar = Transaksi::find($id);
        // $bayar = Transaksi::where('id_prop', $prop->id)->first();
        // dd($bayar);
        return view('customer.pembayaran', compact('bayar'));
    }

    public function pembayaran(Request $request, $id){
        $bayar = new Transaksi();

        $iklan = Properti::find($id)->iklan;
        // $iklan->transaksi = 1;

        $bayar->id_prop = $request->id_prop;
        $bayar->id_user = $request->id_user;
        $bayar->id_penjual = $request->id_penjual;
        $bayar->invoice = $request->invoice;
        $bayar->konf_user = $request->konf_user;
        $bayar->konf_admin = $request->konf_admin;
        $bayar->berhasil = $request->berhasil;

        $iklan->save();
        $bayar->save();

        return view('customer.pembayaran', compact('bayar'));
    }

    public function detailPembelian($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();

        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->where('refund', '0')->sum('nominal');
        
        $bukti = Bukti::where('id_transaksi', $trans->id)->where('refund', '0')->get();
        
        // dd($nominal);

        return view('customer.detailPembelian', compact('transaksi', 'bukti', 'nominal'));
    }

    public function detailPenjualan($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();

        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->where('refund', '0')->sum('nominal');
        
        $bukti = Bukti::where('id_transaksi', $trans->id)->where('refund', '0')->get();
        // dd($data);
        return view('customer.detailPenjualan', compact('transaksi', 'bukti', 'nominal'));
    }

    public function invoice($id){
        set_time_limit(0);
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();

        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->where('refund', '0')->sum('nominal');
        
        $bukti = Bukti::where('id_transaksi', $trans->id)->where('refund', '0')->get();

        $ambil = Transaksi::find($id)->proper;
        $nama = $ambil->nama_prop;

        // dd($nama);

        $pdf = PDF::loadview('invoice', compact('transaksi', 'bukti', 'nominal'))->setPaper('a4', 'potrait');
        return $pdf->stream('invoice'."-".$nama);

        // return view('invoice', compact('transaksi', 'bukti', 'nominal'));
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
