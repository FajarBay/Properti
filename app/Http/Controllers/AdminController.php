<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Properti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminController extends Controller
{
    public function dash(Request $request)
    {

        $products = Properti::orderBy('id', 'desc')->paginate(4);

        return view('admin.adminDash', compact('products'));
    }

    public function daftarIklan(Request $request)
    {

        $products = Properti::orderBy('id', 'desc')->paginate(4);

        return view('admin.daftarIklan', compact('products'));
    }

    public function kategori(Request $request)
    {

        $kategori = Kategori::orderBy('id')->paginate(4);

        return view('admin.daftarKategori', compact('kategori'));
    }

    public function user(Request $request)
    {

        $user = DB::table('users')->where('admin','0')->orderBy('id', 'desc')->paginate(4);

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
        return back();
    }
}
