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
                                <li class="">Langkah 1</li>
                                <li class="active">Langkah 2</li>
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
                                    @if(isset($properti->Foto1))
                                    <img alt="Product Image" width="100" height="100" src="/foto1/{{$properti->Foto1}}"/>
                                    @endif
                                    @if(isset($properti->Foto2))
                                    <img alt="Product Image" width="100" height="100" src="/foto2/{{$properti->Foto2}}"/>
                                    @endif
                                    @if(isset($properti->Foto3))
                                    <img alt="Product Image" width="100" height="100" src="/foto3/{{$properti->Foto3}}"/>
                                    @endif
                                    @if(isset($properti->Foto4))
                                    <img alt="Product Image" width="100" height="100" src="/foto4/{{$properti->Foto4}}"/>
                                    @endif
                                    <form method="POST" action="/properti3" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Foto 1</label>
                                                <input class="form-control" name="foto1" type="file" {{ (!empty($properti->Foto1)) ? "disabled" : ''}}>
                                                <small class="form-text text-muted">Masukan foto properti bagian depan.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="squareInput">Foto 2</label>
                                                <input class="form-control" name="foto2" type="file" {{ (!empty($properti->Foto2)) ? "disabled" : ''}}>
                                                <small class="form-text text-muted">Masukan foto properti bagian samping kanan.</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="squareInput">Foto 3</label>
                                                <input class="form-control" name="foto3" type="file" {{ (!empty($properti->Foto3)) ? "disabled" : ''}}>
                                                <small class="form-text text-muted">Masukan foto properti bagian samping kiri.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="squareInput">Foto 4</label>
                                                <input class="form-control" type="file" name="foto4" {{ (!empty($properti->Foto4)) ? "disabled" : ''}}>
                                                <small class="form-text text-muted">Masukan foto properti bagian belakang.</small>
                                            </div>
                                            <button type="submit" class="btn btn-success">Lanjutkan</button>
                                            <a type="button" href="/properti2" class="btn btn-danger">Kembali</a>
                                            @if(isset($properti->Foto1))
                                            <form action="/remove-image" method="post">
                                                {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">Remove Image</button>
                                            </form>
                                            @endif
                                            </div>
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