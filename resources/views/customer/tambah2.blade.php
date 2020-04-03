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
                        <img src="assets/img/blog/c5.jpg">
                    </div>
                    <div class="info">
                        <a class="" href="cek">
                            <span>
                                Fajar Bayu
									<span class="user-level">Pengguna</span>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="dashboard">
                            <i class="la la-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="iklan">
                            <i class="la la-tags"></i>
                            <p>Daftar Iklan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="grafik">
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
                                    <a href="chatAdmin">
                                        <span class="link-collapse">Pesan Admin</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="chatCustomer">
                                        <span class="link-collapse">Pesan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="pembelian">
                            <i class="la la-dollar"></i>
                            <p>Pembelian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="penjualan">
                            <i class="la la-money"></i>
                            <p>Penjualan</p>
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
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Isi Data Properti</div>
                                </div>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="card-body">
                                    <form method="POST" action="/properti2" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Jenis Iklan</label></br>
                                                <select class="form-control" name="id_kat">
                                                    <option data-display="Kategori">-- Kategori --</option>
                                                    @foreach ($kat as $k)
                                                    <option value="{{$k->id}}"{{(isset($properti->id_kat) && $k->id === $properti->id_kat) ? 'Selected' : ''}}>{{$k->nama_kat}}</option>
                                                    @endforeach
                                                    {{-- <option name="id_kat" {{{ (isset($properti->id_kat) && $properti->id_kat == '1') ? "selected" : "" }}} value="1">Rumah</option>
                                                    <option name="id_kat" {{{ (isset($properti->id_kat) && $properti->id_kat == '2') ? "selected" : "" }}} value="2">Kos</option>
                                                    <option name="id_kat" {{{ (isset($properti->id_kat) && $properti->id_kat == '3') ? "selected" : "" }}} value="3">Apartemen</option>
                                                    <option name="id_kat" {{{ (isset($properti->id_kat) && $properti->id_kat == '4') ? "selected" : "" }}} value="4">Tanah</option>
                                                    <option name="id_kat" {{{ (isset($properti->id_kat) && $properti->id_kat == '5') ? "selected" : "" }}} value="5">Ruko</option>
                                                    <option name="id_kat" {{{ (isset($properti->id_kat) && $properti->id_kat == '6') ? "selected" : "" }}} value="6">Kios/Toko</option> --}}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_prop">Nama Properti</label>
                                                <input for="nama_prop" name="nama_prop" type="text" class="form-control" id="properti" placeholder="Masukan nama properti" value="{{ session()->get('properti.nama_prop') }}">
                                                <small id="namaHelp" class="form-text text-muted">Contoh : Rumah Idaman.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input for="harga" name="harga" type="text" class="form-control input-square" id="harga" placeholder="Masukan harga" onkeyup="copytextbox();" value="{{ session()->get('properti.harga') }}">
                                                <input type="text" class="form-control" id="hasil" placeholder="Enter Input" disabled>
                                                <small id="hargaHelp" class="form-text text-muted">Hanya masukan angka.</small>
                                            </div>
                                        </div>
                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi Properti</label>
                                                <textarea for="deskripsi" name="deskripsi" class="form-control" id="comment" rows="3" placeholder="Deskripsikan properti">{{ session()->get('properti.deskripsi') }}</textarea>
                                                <small id="deskripsiHelp" class="form-text text-muted">Contoh : Luas bangunan, Luas tanah, Jumlah kamar dan lainnya.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="fasilitas">Fasilitas Properti</label>
                                                <textarea for="fasilitas" name="fasilitas" class="form-control" id="comment" rows="3" placeholder="Fasilitas yang tersedia">{{ session()->get('properti.fasilitas') }}</textarea>
                                                <small id="fasilitasHelp" class="form-text text-muted">Contoh : Wifi, Parkir Mobil, Dapur dan lainnya.</small>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success">Lanjutkan</button>
                                                {{-- <a type="button" href="/properti1" class="btn btn-danger">Kembali</a> --}}
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