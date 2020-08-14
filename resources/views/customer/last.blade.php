@extends('layouts.cusBase')

@section('content')
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="utama" class="logo"><img src="asset/img/logo-nav.png"></a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav md-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="button">
                                Tambah Iklan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar">
            <div class="scrollbar-inner sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{{ URL::to('/') }}/profil/{{ Auth::user()->profil }}">
                    </div>
                    <div class="info">
                        <a class="" href="cek">
                            <span>
                                {{Auth::user()->name}}
									<span class="user-level">Pengguna</span>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="/dashboard">
                            <i class="la la-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="/iklan">
                            <i class="la la-tags"></i>
                            <p>Daftar Iklan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pesanan">
                            <i class="la la-shopping-cart"></i>
                            <p>Pesanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#collapseExample1" data-toggle="collapse" aria-expanded="true">
                            <i class="la la-envelope-o"></i>
                            <p>Pesan</p>
                            <span class="caret float-right"></span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample1" aria-expanded="true" style="">
                            <ul class="nav">
                                <li>
                                    <a href="/chatAdmin">
                                        <span class="link-collapse">Pesan Admin</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/chatCustomer">
                                        <span class="link-collapse">Pesan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/pembelian">
                            <i class="la la-cart-plus"></i>
                            <p>Pembelian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/penjualan">
                            <i class="la la-money"></i>
                            <p>Penjualan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pengembalian">
                            <i class="la la-dollar"></i>
                            <p>Pengembalian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="la la-power-off"></i>
                            <p>Keluar</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 space">
                            <ul class="progressbar">
                                <li class="">Langkah 1</li>
                                <li class="">Langkah 2</li>
                                <li class="">Langkah 3</li>
                                <li class="active">Langkah 4</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Isi Data Properti</div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/properti5" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{-- <input type="hidden" name="id_user" value="{{ Properti::where('id','=',$id) }}"> --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label for="squareInput">Jenis Iklan</label></br>
                                                <select class="form-control" name="jenis">
                                                    <option name="jenis" {{{ (isset($properti->jenis) && $properti->jenis == '0') ? "selected" : "" }}} value="0">Jual</option>
                                                    <option name="jenis" {{{ (isset($properti->jenis) && $properti->jenis == '1') ? "selected" : "" }}} value="1">Sewa Harian</option>
                                                    <option name="jenis" {{{ (isset($properti->jenis) && $properti->jenis == '2') ? "selected" : "" }}} value="2">Sewa Mingguan</option>
                                                    <option name="jenis" {{{ (isset($properti->jenis) && $properti->jenis == '3') ? "selected" : "" }}} value="3">Sewa Bulanan</option>
                                                    <option name="jenis" {{{ (isset($properti->jenis) && $properti->jenis == '4') ? "selected" : "" }}} value="4">Sewa Tahunan</option>
                                                </select>
                                                <small id="hargaHelp" class="form-text text-muted">Apakah iklan ada untuk jual atau di sewakan.</small>
                                            </div>
                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Harga Nego?</label></br>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" type="radio" name="nego" {{{ (isset($properti->nego) && $properti->nego == '0') ? "checked" : "" }}} value="0">
                                                    <span class="form-radio-sign">Iya</span>
                                                </label></br>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" type="radio" name="nego" {{{ (isset($properti->nego) && $properti->nego == '1') ? "checked" : "" }}} value="1">
                                                    <span class="form-radio-sign">Tidak</span>
                                                </label>
                                                <small id="hargaHelp" class="form-text text-muted">Apakah iklan ada dapat dinego?.</small>
                                            </div>
                                            
                                            <input type="hidden" name="id_prop" value="{{$properti->id}}">
                                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="sold" value="1">
                                            <input type="hidden" name="status" value="0">
                                            <input type="hidden" name="book" value="0">
                                            <input type="hidden" name="dilihat" value="0">
                                            <input type="hidden" name="transaksi" value="0">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                                Lanjutkan
                                            </button>
                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Persetujuan Memasang Iklan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Data Iklan ini akan dipasang sesuai dengan data yang Anda masukkan. Untuk Status Verifikasi Admin dilakukan maksimal 3 hari setelah iklan di iklankan, jika dalam 3 hari, Iklan anda Belum terverifikasi, maka lengkapi data Anda, serta Hubungi Kami untuk
                                                            mempercepat Proses verifikasi
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Pasang</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <a href="tambah3">
                                                <button class="btn btn-danger">Kembali</button>
                                            </a> --}}
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link">
										Proper <i class="la la-cubes"></i> Sistem Informasi Penjualan Properti
									</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2018, made with <i class="la la-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @endsection