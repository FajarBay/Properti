<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Properti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Iklan;
use App\Transaksi;
use App\Bukti;
use App\Mail\konfMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dash(Request $request)
    {

        $products = Properti::orderBy('id', 'desc')->paginate(4);

        return view('admin.adminDash', compact('products'));
    }

    public function daftarIklan(Request $request)
    {

        $products = Properti::orderBy('id', 'desc')->paginate(5);

        return view('admin.daftarIklan', compact('products'));
    }
    // MULAI SHORT
    public function iklanMurah(){
        $products = Properti::orderBy('harga', 'asc')->paginate(5);

        return view('admin.daftarIklan', compact('products'));
    }

    public function iklanMahal(){
        $products = Properti::orderBy('harga', 'desc')->paginate(5);

        return view('admin.daftarIklan', compact('products'));
    }

    public function terjual(){
        $temp = Iklan::where('sold', '1')->get();
        $iklan = $temp->pluck('id_prop');
        if($iklan != null) {
            $products = Properti::whereIn('id', $iklan->all())->orderBy('id', 'desc')->paginate(5);
        }else{
            $products = Properti::where('id_kat', '9999')->orderBy('harga', 'desc')->paginate(5);
            
        }

        // dd($iklan);

        return view('admin.daftarIklan', compact('products'));
    }

    public function belumTerjual(){
        $temp = Iklan::where('sold', '0')->get();
        $iklan = $temp->pluck('id_prop');
        $products = Properti::whereIn('id', $iklan->all())->orderBy('id', 'desc')->paginate(5);
        // dd($products);
        return view('admin.daftarIklan', compact('products'));
    }

    public function terverifikasi(){
        $temp = Iklan::where('status', '1')->get();
        $iklan = $temp->pluck('id_prop');
        $products = Properti::whereIn('id', $iklan->all())->orderBy('id', 'desc')->paginate(5);

        return view('admin.daftarIklan', compact('products'));
    }

    public function belumTerverifikasi(){
        $temp = Iklan::where('status', '0')->get();
        $iklan = $temp->pluck('id_prop');
        $products = Properti::whereIn('id', $iklan->all())->orderBy('id', 'desc')->paginate(5);

        return view('admin.daftarIklan', compact('products'));
    }
    // AKHIR SHORT
    
    public function kategori(Request $request)
    {

        $kategori = Kategori::all();

        return view('admin.daftarKategori', compact('kategori'));
    }

    public function sembunyikan($id){
        $kategori = Kategori::where('id', $id)->first();
        $kategori->aktif = 0;
        $kategori->save();

        return back();
    }

    public function tampilkan($id){
        $kategori = Kategori::where('id', $id)->first();
        $kategori->aktif = 1;
        $kategori->save();

        return back();
    }

    public function edit($id){
        $kategori = Kategori::where('id', $id)->get();

        return view('admin.editKat', compact('kategori'));
    }
    
    public function update(Request $request, $id){
        $kategori = Kategori::where('id', $id)->first();

        $kategori->nama_kat = $request->nama_kat;
        // $nama = 'gambar'.time().'.'.request()->gambar->getClientOriginalExtension();
        // $request->gambar->move('gambar',$nama);
        // $kategori->gambar = $nama;
        $kategori->keterangan_kat = $request->keterangan_kat;

        $kategori->save();
        
        return redirect('/daftarKategori');
    }

    public function user(Request $request)
    {

        $user = DB::table('users')->where('admin','0')->orderBy('id', 'desc')->paginate(5);

        return view('admin.daftarUser', compact('user'));
    }

    public function detailUser(Request $request, $id)
    {

        $user = User::where('id', $id)->get();

        return view('admin.detailUser', compact('user'));
    }

    public function show($id)
    {
        $properti = Properti::where('id', $id)->get();
       	return view('admin.detailIklan', compact('properti'));
    }

    public function transaksi(){
        $penjualan = Transaksi::where('berhasil', '1')->orderBy('id', 'desc')->paginate(5);
        // dd($penjualan);
        return view('admin.daftarPembayaran', compact('penjualan'));
    }

    public function cariTransaksi(Request $request){
        $cari = $request->cari;

        $penjualan = Transaksi::join('propertis', 'transaksis.id_prop', '=','propertis.id')->where(function ($q) use($cari){
            $q->where('invoice', 'like', "%".$cari."%")->orWhere('propertis.nama_prop', 'like', "%".$cari."%")
            ->orWhere('propertis.harga', 'like', "%".$cari."%")->orWhere('transaksis.created_at', 'like', "%".$cari."%");
        })->where('berhasil', '1')->orderBy('propertis.harga', 'asc')->select('transaksis.*', 'propertis.harga')->paginate(5);

        return view('admin.daftarPembayaran', compact('penjualan'));
    }

    // MULAI SHORT
    public function terendah(){

        $penjualan = Transaksi::where('berhasil', '1')->join('propertis', 'transaksis.id_prop', '=',
        'propertis.id')->orderBy('propertis.harga', 'asc')->select('transaksis.*', 'propertis.harga')->paginate(5);

        return view('admin.daftarPembayaran', compact('penjualan'));
    }

    public function tertinggi(){

        $penjualan = Transaksi::where('berhasil', '1')->join('propertis', 'transaksis.id_prop', '=',
        'propertis.id')->orderBy('propertis.harga', 'desc')->select('transaksis.*', 'propertis.harga')->paginate(5);
        return view('admin.daftarPembayaran', compact('penjualan'));
    }

    public function sudah_konf(){

        $penjualan = Transaksi::where('berhasil', '1')->where('konf_admin', '1')->where('berhasil', '1')->orderBy('id', 'desc')->paginate(5);

        return view('admin.daftarPembayaran', compact('penjualan'));
    }

    public function belum_konf(){

        $penjualan = Transaksi::where('berhasil', '1')->where('konf_admin', '0')->where('berhasil', '1')->orderBy('id', 'desc')->paginate(5);

        return view('admin.daftarPembayaran', compact('penjualan'));
    }
    // AKHIR SHORT

    public function verifIklan($id) {
        $iklan = Properti::find($id)->iklan;
        $iklan->status = 1;
        $iklan->save();
        return back();
    }

    public function batalVerif($id) {
        $iklan = Properti::find($id)->iklan;
        $iklan->status = 0;
        $iklan->save();
        return redirect('/daftarIklan');
    }

    public function detailPembayaran($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();
        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->sum('nominal');
        $bukti = Bukti::where('id_transaksi', $trans->id)->get();
        return view('admin.detailPembayaran', compact('transaksi', 'bukti', 'nominal'));
    }

    public function verifBayar($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->konf_admin = 1;
        $iklan = Transaksi::find($id)->proper->iklan;
        $email1 = Transaksi::find($id)->penjual->email;
        $email2 = Transaksi::find($id)->pembeli->email;
        $iklan->sold = 1;
        // $iklan->book = 99;
        $transaksi->save();
        $iklan->save();
        Mail::to($email1)->send(new KonfMail());
        Mail::to($email2)->send(new KonfMail());
        return back();
    }

    public function verifBatal($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->konf_admin = 0;
        $iklan = Transaksi::find($id)->proper->iklan;
        $iklan->sold = 0;
        // $iklan->book = 99;
        $transaksi->save();
        $iklan->save();
        return back();
    }

    public function cariIklan(Request $request){
        $cari = $request->cari;

        $products = Properti::where('nama_prop', 'like', "%".$cari."%")->orderBy('id', 'desc')->paginate(5);

        return view('admin.daftarIklan', compact('products'));
    }

    public function cariUser(Request $request){
        $cari = $request->cari;

        $user = DB::table('users')->where('admin','0')->where(function ($q) use($cari){
            $q->where('name', 'like', "%".$cari."%")->orWhere('email', 'like', "%".$cari."%")
            ->orWhere('phone', 'like', "%".$cari."%");
        })->orderBy('id', 'desc')->paginate(5);

        return view('admin.daftarUser', compact('user'));
    }

    public function invoice_lihat($id){
        set_time_limit(0);
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();

        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->sum('nominal');
        
        $bukti = Bukti::where('id_transaksi', $trans->id)->get();

        return view('lihatInvoice', compact('transaksi', 'bukti', 'nominal'));
    }

    public function daftarPengembalian(){
        $penjualan = Transaksi::where('berhasil', '0')->orderBy('id', 'desc')->paginate(5);
        $trans = Transaksi::where('berhasil', '0')->pluck('id');
        $bukti = Bukti::whereIn('id_transaksi', $trans->all())->where('refund', '0')->value('id');
        return view('admin.daftarPengembalian', compact('penjualan', 'bukti'));
    }

    public function detailRefund($id){
        $transaksi = Transaksi::where('id', $id)->orderBy('id', 'desc')->get();
        $trans = Transaksi::where('id', $id)->first();
        $nominal = Bukti::where('id_transaksi', '=', $trans->id)->where('refund', '1')->sum('nominal');
        
        $bukti = Bukti::where('id_transaksi', $trans->id)->where('refund', '2')->get();
        $img = Bukti::where('id_transaksi', $trans->id)->where('refund', '1')->value('bukti');
        
        // dd($img);

        return view('admin.detailRefund', compact('transaksi', 'bukti', 'nominal', 'img'));
    }

    public function cariPengembalian(Request $request){
        $cari = $request->cari;

        $penjualan = Transaksi::join('propertis', 'transaksis.id_prop', '=','propertis.id')->where(function ($q) use($cari){
            $q->where('propertis.nama_prop', 'like', "%".$cari."%")->orWhere('transaksis.created_at', 'like', "%".$cari."%");
        })->where('berhasil', '0')->orderBy('propertis.harga', 'asc')->select('transaksis.*', 'propertis.harga')->paginate(5);

        return view('admin.daftarIklan', compact('penjualan'));
    }
}
