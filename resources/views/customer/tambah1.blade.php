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
                                <li class="active">Langkah 1</li>
                                <li class="">Langkah 2</li>
                                <li class="">Langkah 3</li>
                                <li class="">Langkah 4</li>
                                <li class="">Langkah 5</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Isi Data Properti</div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/properti1" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Rumah</label></br>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" name="id_kat" type="radio" {{{ (isset($properti->id_kat) && $properti->id_kat == 'K01') ? "checked" : "" }}} value="K01">
                                                    <span class="form-radio-sign">Pilih</span>
                                                </label>
                                                <small id="hargaHelp" class="form-text text-muted">Iklankan rumah anda disini!</small>
                                            </div>
                                        </div>
                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Kos</label></br>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" name="id_kat" type="radio" {{{ (isset($properti->id_kat) && $properti->id_kat == 'K02') ? "checked" : "" }}} value="K02">
                                                    <span class="form-radio-sign">Pilih</span>
                                                </label>
                                                <small id="hargaHelp" class="form-text text-muted">Iklankan kos anda disini!</small>
                                            </div>
                            
                                        </div>
                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Apartemen</label></br>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" name="id_kat" type="radio" {{{ (isset($properti->id_kat) && $properti->id_kat == 'K03') ? "checked" : "" }}} value="K03">
                                                    <span class="form-radio-sign">Pilih</span>
                                                </label>
                                                <small id="hargaHelp" class="form-text text-muted">Iklankan apartemen anda disini!</small>
                                            </div>
                            
                                        </div>
                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Tanah</label></br>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" name="id_kat" type="radio" {{{ (isset($properti->id_kat) && $properti->id_kat == 'K04') ? "checked" : "" }}} value="K04">
                                                    <span class="form-radio-sign">Pilih</span>
                                                </label>
                                                <small id="hargaHelp" class="form-text text-muted">Iklankan tanah anda disini!</small>
                                            </div>
                            
                                        </div>
                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Ruko</label></br>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" name="id_kat" type="radio" {{{ (isset($properti->id_kat) && $properti->id_kat == 'K05') ? "checked" : "" }}} value="K05">
                                                    <span class="form-radio-sign">Pilih</span>
                                                </label>
                                                <small id="hargaHelp" class="form-text text-muted">Iklankan ruko anda disini!</small>
                                            </div>
                            
                                        </div>
                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Kios/Toko</label></br>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" name="id_kat" type="radio" {{{ (isset($properti->id_kat) && $properti->id_kat == 'K06') ? "checked" : "" }}} value="K06">
                                                    <span class="form-radio-sign">Pilih</span>
                                                </label>
                                                <small id="hargaHelp" class="form-text text-muted">Iklankan kios/toko anda disini!</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                            <button type="submit" class="btn btn-success">Lanjutkan</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Rumah
                                        <p class="card-category">Iklankan rumah anda disini!</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="tambah2.html">
                                        <button class="btn btn-success">Tambah</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Kos
                                        <p class="card-category">Iklankan kos anda disini!</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-success">Tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Apartemen
                                        <p class="card-category">Iklankan apartemen anda disini!</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-success">Tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Tanah
                                        <p class="card-category">Iklankan tanah anda disini!</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-success">Tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Ruko
                                        <p class="card-category">Iklankan ruko anda disini</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-success">Tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Kios/Toko
                                        <p class="card-category">Iklankan kios/toko anda disini!</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-success">Tambah</button>
                                </div>
                            </div>
                        </div> -->
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