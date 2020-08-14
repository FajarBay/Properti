@extends('layouts.edit')

@section('content')
    <div class="wrapper">
    <div class="main-header">
            <div class="logo-header">
                <a href="/utama" class="logo"><img src="{{asset ('asset/img/logo-nav.png') }}"></a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav md-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="/daftarIklan" role="button">
                                Daftar Iklan
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
                        <img src="{{asset ('asset/img/support.png') }}">
                    </div>
                    <div class="info">
                        <a class="" href="adminDash">
                            <span>
									Admin
									<span class="user-level">Pengelola</span>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="/adminDash">
                            <i class="la la-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="/daftarIklan">
                            <i class="la la-tags"></i>
                            <p>Daftar Iklan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/daftarUser">
                            <i class="la la-users"></i>
                            <p>Daftar User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/adminChat">
                            <i class="la la-envelope-o"></i>
                            <p>Pesan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/daftarKategori">
                            <i class="la la-newspaper-o"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/daftarPembayaran">
                            <i class="la la-money"></i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/daftarPengembalian">
                            <i class="la la-dollar"></i>
                            <p>Daftar Pengembalian</p>
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
                            @foreach($properti as $p)
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Detail Iklan
                                        <?php
                                            if($p->iklan->sold == 0){
                                               echo "<span class=\"badge badge-primary float-right\">Belum Terjual</span>";
                                            }else {
                                               echo "<span class=\"badge badge-danger float-right\">Terjual</span>";
                                            }
                                        ?>
                                        <?php
                                            if($p->iklan->status == 0){
                                               echo "<span class=\"badge badge-warning float-right mr-1\">Menunggu</span>";
                                            }else {
                                               echo "<span class=\"badge badge-success float-right mr-1\">Terverifikasi</span>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <div class=" card-body table-responsive ">
                                                    <div id="carouselExampleIndicators" class="carousel slide w-75 mx-auto" data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                                        </ol>
                                                        <div class="carousel-inner" style="height: 400px;">
                                                            <div class="carousel-item active">
                                                                <img class="d-block w-100 img-fluid" src="{{asset ('assets/img/a2.jpg')}}" alt="First slide">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100 img-fluid" src="{{asset ('assets/img/a4.jpg')}}" alt="Second slide">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100 img-fluid" src="{{asset ('assets/img/a1.jpg')}}" alt="Third slide">
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100 img-fluid" src="{{asset ('assets/img/a3.jpg')}}" alt="Third slide">
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
                                                                        echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->harga)),3)));
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
                                                                    setlocale(LC_ALL, 'IND');
                                                                    $date = new DateTime($p->created_at);
                                                                    echo strftime("%d %B %Y", $date->getTimestamp());
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="250px">Maps</td>
                                                                <td>{{$p->alamatmaps}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="250px">Jenis</td>
                                                                <td><?php 
                                                                    if($p->iklan->jenis == 0){
                                                                        echo "Iklan Jual";
                                                                    }else if($p->iklan->jenis == 1) {
                                                                        echo "Iklan Sewa/Hari";
                                                                    }else if($p->iklan->jenis == 2) {
                                                                        echo "Iklan Sewa/Minggu";
                                                                    }else if($p->iklan->jenis == 3) {
                                                                        echo "Iklan Sewa/Bulan";
                                                                    }else if($p->iklan->jenis == 4) {
                                                                        echo "Iklan Sewa/Tahun";
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="250px">Nego</td>
                                                                <td>
                                                                    @if($p->iklan->nego == 0)
                                                                        Iya
                                                                    @else
                                                                        Tidak
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                    <div class="text-right" style="display:flex; float:right">
                                                    @if($p->iklan->status == 0)
                                                        <form action="{{route('verifIklan', $p->iklan->id)}}" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-success mr-1">Verifikasi</button>
                                                        </form>
                                                    @else
                                                    <form action="{{route('batalVerif', $p->iklan->id)}}" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-warning mr-1">Batal Verifikasi</button>
                                                    </form>
                                                    @endif
                                                        {{-- <button class="btn btn-success">Konfirmasi</button> --}}
                                                    {{-- </a> --}}
                                                    <a href="/cek">
                                                        <button class="btn btn-danger">Kembali</button>
                                                    </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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