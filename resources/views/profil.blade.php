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
                    <li class="nav-item">
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Informasi Pengguna</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        @foreach($user as $u)
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="text-center mb-3">
                                                    <img src="{{ URL::to('/') }}/profil/{{ $u->profil }}" class="rounded" width="150px" height="150px">
                                                </div>
                                                <div class="text-center">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="la la-camera" style="font-size:16px"></i> Ubah Foto
                                                </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group has-success">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td width="150px">Nama</td>
                                                            <td width="20px">:</td>
                                                            <td>{{$u->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="150px">Nomor Telepon</td>
                                                            <td width="20px">:</td>
                                                            <td>{{$u->phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="150px">Alamat :</td>
                                                            <td width="20px">:</td>
                                                            <td>{{$u->provinsi}}, {{$u->kabupaten}}, {{$u->kecamatan}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="150px">Foto KTP</td>
                                                            <td width="20px">:</td>
                                                            <td><img alt="Product Image" width="350" height="200" src="{{ URL::to('/') }}/ktp/{{ $u->ktp }}"/></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <a href="{{route('editProfil', $u->id)}}">
                                                        <button class="btn btn-warning">Ubah Profil</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <form action="/ava" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Foto Profil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file" class="form-control-file" name="profil" id="profil" aria-describedby="fileHelp">
                                            <small id="hargaHelp" class="form-text text-muted">Masukan foto maksimal ukuran 1024 x 1024</small>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
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
    </div>
    @endsection