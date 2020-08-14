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
                                <li class="active">Langkah 3</li>
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
                                    <form method="POST" action="/properti4" enctype="multipart/form-data">
                                       {{ csrf_field() }}
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="squareInput">Provinsi</label>
                                               <select class="form-control" id="propinsi">
                                                   <option selected="" value="">-- Pilih Provinsi --</option>
                                               </select>
                                               <small id="namaHelp" class="form-text text-muted">Pilih provinsi lokasi iklan.</small>
                                           </div>
                                           <div class="form-group">
                                               <label for="squareSelect">Kabupaten</label>
                                               <select class="form-control" id="kabupaten">
                                                   <option selected="" value="">-- Pilih Kabupaten --</option>
                                               </select>
                                               <small id="hargaHelp" class="form-text text-muted">Pilih kabupaten lokasi iklan.</small>
                                           </div>
                                           <div class="form-group">
                                               <label for="squareSelect">Kecamatan</label>
                                               <select class="form-control" id="kecamatan">
                                                   <option selected="" value="">-- Pilih Kecamatan --</option>
                                               </select>
                                               <small id="hargaHelp" class="form-text text-muted">Pilih kecamatan lokasi iklan.</small>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="comment">Alamat Lengkap</label>
                                            <textarea class="form-control" name="alamat" id="comment" rows="3" placeholder="Masukan alamat lengkap">{{ session()->get('properti.alamat') }}</textarea>
                                            <small id="deskripsiHelp" class="form-text text-muted">Contoh : Jalan Mangga No.29C, Karanggayam, Caturtunggal, Depok, Sleman, Yogyakarta.</small>
                                        </div>
                                           <div class="form-group">
                                               <label for="comment">Alamat Maps</label>
                                               <textarea class="form-control" name="alamatmaps" id="comment" rows="3" placeholder="Masukan alamat maps">{{ session()->get('properti.alamatmaps') }}</textarea>
                                               <small id="fasilitasHelp" class="form-text text-muted">Salin alamat dari google maps, jika tidak ada tulis tidak ada.</small>
                                           </div>
                                           <input id="prop" type="hidden" name="provinsi" value="{{$properti->provinsi}}">
                                           <input id="kab" type="hidden" name="kabupaten" value="{{$properti->kabupaten}}">
                                           <input id="kec" type="hidden" name="kecamatan" value="{{$properti->kecamatan}}">
                                               <button type="submit" class="btn btn-success">Lanjutkan</button>
                                           <a type="button" href="/properti3" class="btn btn-danger">Kembali</a>
                                       </div>
                                   </div>
                                    </form>
                                   {{-- <form method="POST" action="/properti4" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                    <input id="prop" type="text" name="provinsi">
                                    <input id="kab" type="text" name="kabupaten">
                                    <input id="kec" type="text" name="kecamatan">
                                   <a href="tambah4">
                                       <button class="btn btn-success">Lanjutkan</button>
                                   </a>
                                   <a href="tambah2">
                                       <button class="btn btn-danger">Kembali</button>
                                   </a>
                                    </form> --}}
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
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