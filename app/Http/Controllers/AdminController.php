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

        $products = Properti::all();

        return view('admin.adminDash', compact('products'));
    }

    public function daftarIklan(Request $request)
    {

        $products = Properti::all();

        return view('admin.daftarIklan', compact('products'));
    }

    public function kategori(Request $request)
    {

        $kategori = Kategori::all();

        return view('admin.daftarKategori', compact('kategori'));
    }

    public function user(Request $request)
    {

        $user = DB::table('users')->where('admin','0')->orderBy('id', 'desc')->get();

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
}
