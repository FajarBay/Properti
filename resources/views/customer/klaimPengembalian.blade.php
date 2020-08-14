@extends('layouts.edit')

@section('content')
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="utama" class="logo"><img src="{{ asset('asset/img/logo-nav.png') }}"></a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav md-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="button">
                                Pesanan
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
                    <li class="nav-item">
                        <a href="/iklan">
                            <i class="la la-tags"></i>
                            <p>Daftar Iklan</p>
                        </a>
                    </li>
                    <li class="nav-item active">
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
                        <div class="col-md-12">
                            <div class="card">
                                <form action="{{route('kirim_bukti', $bayar->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="card-header">
                                        <div class="card-title">Detail Pemesanan</div>
                                    </div>
                                    <div class=" card-body table-responsive ">
                                    <table class="table table-striped table-hover ">
                                        <tbody>
                                            <h6>Masukan Bukti Pembayaran</h6>
                                            <tr>
                                                <td width="250px">Nama Bank</td>
                                                <td>{{$bayar->penjual->bank}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Rekening</td>
                                                <td>{{$bayar->penjual->no_rek}}</td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Nominal</td>
                                                <td>
                                                    <input type="text" name="nominal" id="harga" placeholder="Masukan nominal transfer" class="form-control" autocomplete="off"/>
                                                    <small id="hargaHelp" class="form-text text-muted">Nominal : <b><span id="hasil"></span></b></small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Catatan</td>
                                                <td><input type="text" name="catatan" placeholder="Tambahkan catatan atau keterangan" class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <td>Bukti Pembayaran</td>
                                                <td><input class="form-control" type="file" name="bukti"></td>
                                            </tr>
                                        </tbody>
                                        <input type="hidden" name="id_transaksi" value="{{$bayar->id}}">
                                        <input type="hidden" name="refund" value="1">
                                        <input type="hidden" name="berhasil" value="0">
                                        <input type="hidden" name="bayar" value="0">
                                    </table>
                                    <div class="text-right" style="display:flex; float:right">
                                        <button type="submit" class="btn btn-success mr-1">Kirim</button>
                                        <a type="button" href="/pesanan" class="btn btn-danger">Batal</a>
                                    </div>
                                </div>
                            </form>
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