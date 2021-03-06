@extends('layouts.edit')

@section('content')
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="/utama" class="logo"><img src="{{ asset('asset/img/logo-nav.png') }}"></a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav md-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="button">
                                Profil
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
                        <img src="{{ asset('assets/img/blog/c5.jpg') }}">
                    </div>
                    <div class="info">
                        <a class="" href="/cek">
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
                            <i class="la la-dollar"></i>
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
                        <!-- <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Profile
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="asset/img/profile2.jpg" class="rounded">
                                    </div>
                                </div>
                                <div class="card-body">
                                    Nama Pengguna
                                </div>
                            </div>
                        </div> -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Informasi Anda</div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('prop.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                        {{-- <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="text-center">
                                                        <img src="{{ URL::to('/') }}/profil/{{ $user->profil }}" class="rounded" width="150px" height="150px">
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td width="150px">Nama</td>
                                                                <td width="20px">:</td>
                                                                <td><input type="text" name="name" class="form-control" value="{{ $user->name }}" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="150px">Provinsi</td>
                                                                <td width="20px">:</td>
                                                                <td>
                                                                    <select class="form-control" id="propinsi">
                                                                        <option selected="" value="">-- Pilih Provinsi --</option>
                                                                    </select>
                                                                    <input id="prop" type="hidden" name="provinsi" value="{{ $user->provinsi }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="150px">Kabupaten</td>
                                                                <td width="20px">:</td>
                                                                <td>
                                                                    <select class="form-control" id="kabupaten">
                                                                        <option selected="" value="">-- Pilih Kabupaten --</option>
                                                                    </select>
                                                                    <input id="kab" type="hidden" name="kabupaten" value="{{ $user->kabupaten }}">  
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="150px">Kecamatan</td>
                                                                <td width="20px">:</td>
                                                                <td>
                                                                    <select class="form-control" id="kecamatan">
                                                                        <option selected="" value="">-- Pilih Kecamatan --</option>
                                                                    </select>
                                                                    <input id="kec" type="hidden" name="kecamatan" value="{{ $user->kecamatan }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="150px">Nama Bank</td>
                                                                <td width="20px">:</td>
                                                                <td>
                                                                    <select class="form-control" name="bank">
                                                                        <option name="bank" {{{ (isset($user->bank) && $user->bank == 'Bank BCA') ? "selected" : "" }}} value="Bank BCA">Bank BCA</option>
                                                                        <option name="bank" {{{ (isset($user->bank) && $user->bank == 'Bank Mandiri') ? "selected" : "" }}} value="Bank Mandiri">Bank Mandiri</option>
                                                                        <option name="bank" {{{ (isset($user->bank) && $user->bank == 'Bank BNI') ? "selected" : "" }}} value="Bank BNI">Bank BNI</option>
                                                                        <option name="bank" {{{ (isset($user->bank) && $user->bank == 'Bank BRI') ? "selected" : "" }}} value="Bank BRI">Bank BRI</option>
                                                                        <option name="bank" {{{ (isset($user->bank) && $user->bank == 'Bank Syariah Mandiri') ? "selected" : "" }}} value="Bank Syariah Mandiri">Bank Syariah Mandiri</option>
                                                                        <option name="bank" {{{ (isset($user->bank) && $user->bank == 'Bank BRISyariah') ? "selected" : "" }}} value="Bank BRISyariah">Bank BRISyariah</option>
                                                                        <option name="bank" {{{ (isset($user->bank) && $user->bank == 'Bank BTN') ? "selected" : "" }}} value="Bank BTN">Bank BTN</option>
                                                                    </select>
                                                            </tr>
                                                            <tr>
                                                                <td width="150px">Nomor Rekening</td>
                                                                <td width="20px">:</td>
                                                                <td><input type="text" name="no_rek" class="form-control" value="{{$user->no_rek}}" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="150px">Foto KTP</td>
                                                                <td width="20px">:</td>
                                                                <td>
                                                                    <img src="{{ URL::to('/') }}/ktp/{{ $user->ktp }}" class="img-thumbnail mb-2" width="350" height="200" /></br>
                                                                    <input type="file" name="ktp" />
                                                                    <input type="hidden" name="hidden_image" value="{{ $user->ktp }}" /></br>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="form-group float-right">
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        <a href="/cek">
                                                            <button class="btn btn-danger">Batal</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- </div> --}}
                                    </form>
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
    </div>
    @endsection