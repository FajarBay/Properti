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
                                Data Iklan
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
                        <a href="/grafik">
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
                                @foreach($properti as $p)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Detail Iklan Anda
                                            <?php
                                                if($p->iklan->status == 0){
                                                    echo "<span class=\"badge badge-warning float-right\">Menunggu Konfirmasi Admin</span>";
                                                }else {
                                                    echo "<span class=\"badge badge-success float-right\">Aktif</span>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    {{-- <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="form-group"> --}}

                                                    <div class="card-body table-responsive ">
                                                        <div id="carouselExampleIndicators" class="carousel slide w-75 mx-auto" data-ride="carousel">
                                                            <ol class="carousel-indicators">
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                                            </ol>
                                                            <div class="carousel-inner" style="height: 400px;">
                                                                <div class="carousel-item active">
                                                                    <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto1/{{ $p->foto1 }}" alt="First slide">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto2/{{ $p->foto2 }}" alt="Second slide">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto3/{{ $p->foto3 }}" alt="Third slide">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto4/{{ $p->foto4 }}" alt="Third slide">
                                                                </div>
                                                            </div>
                                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                        <hr>
                                                        <table class="table table-striped table-hover ">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="250px">Judul Iklan</td>
                                                                    <td><strong>{{$p->nama_prop}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="250px">Kategori</td>
                                                                    <td>
                                                                        {{$p->kategori->nama_kat}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="250px">Harga</td>
                                                                    <td>
                                                                        <?php 
                                                                        if($p->iklan->jenis == 0) {
                                                                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->harga)),3)));
                                                                        }else if($p->iklan->jenis == 1){
                                                                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->harga)),3))).' /Hari';
                                                                        }else if($p->iklan->jenis == 2){
                                                                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->harga)),3))).' /Minggu';
                                                                        }else if($p->iklan->jenis == 3){
                                                                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->harga)),3))).' /Bulan';
                                                                        }else if($p->iklan->jenis == 4){
                                                                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->harga)),3))).' /Tahun';
                                                                        }					
                                                                        // echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($d->harga)),3)));
                                                                        ?>	
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="250px">Alamat</td>
                                                                    <td>{{$p->provinsi}}, {{$p->kabupaten}}, {{$p->kecamatan}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="250px">Alamat Lengkap</td>
                                                                    <td>{{$p->alamat}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="250px">Deskripsi</td>
                                                                    <td>{{$p->deskripsi}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="250px">Fasilitas</td>
                                                                    <td>{{$p->fasilitas}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="250px">Tanggal</td>
                                                                    <td>
                                                                        <?php
                                                                        $date = new DateTime($p->created_at);
                                                                        echo $date->format('d F Y');
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="250px">Maps</td>
                                                                    <td>{{$p->alamatmaps}}</td>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <div class="text-right ">
                                                        <a href="{{route('iklan.edit', $p->id)}}">
                                                            <button class="btn btn-warning">Ubah</button>
                                                        </a>
                                                        <a href="/iklan">
                                                            <button class="btn btn-danger">Kembali</button>
                                                        </a>
                                                        {{-- </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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