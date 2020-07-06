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
                            <a class="nav-link" href="/daftarPembayaran" role="button">
                                Pembayaran
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
                        <img src="{{ asset('asset/img/support.png')}}">
                    </div>
                    <div class="info">
                        <a class="" href="/adminDash">
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
                    <li class="nav-item">
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
                    <li class="nav-item  active">
                        <a href="/daftarPembayaran">
                            <i class="la la-money"></i>
                            <p>Pembayaran</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="laporan">
                            <i class="la la-file-pdf-o"></i>
                            <p>Laporan</p>
                        </a>
                    </li> --}}
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
                            @foreach($transaksi as $p)
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Detail Pembayaran
                                        <span class="badge badge-warning float-right">Menunggu</span>
                                        {{-- <span class="badge badge-success float-right">Terverifikasi</span> --}}
                                    </div>
                                </div>
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
                                                <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto1/{{ $p->proper->foto1 }}" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto2/{{ $p->proper->foto2 }}" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto3/{{ $p->proper->foto3 }}" alt="Third slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto4/{{ $p->proper->foto4 }}" alt="Third slide">
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
                                                <td width="250px">Nomor Invoice</td>
                                                <td>{{$p->invoice}}</td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Judul Iklan</td>
                                                <td>
                                                    <a href="{{route('lihatlah', $p->proper->id)}}">{{$p->proper->nama_prop}}</a></td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Penjual</td>
                                                <td><a href="">{{$p->penjual->name}}</a></td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Pembeli</td>
                                                <td><a href="">{{$p->pembeli->name}}</a></td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Konfirmasi Penjual</td>
                                                <td>
                                                    @if($p->konf_penjual == 0)
                                                        Belum Dikonfirmasi
                                                    @else
                                                        Dikonfirmasi
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Harga</td>
                                                <td>
                                                    <?php 		
                                                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->proper->harga)),3)));
                                                        ?> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Alamat</td>
                                                <td>{{$p->proper->provinsi}}, {{$p->proper->kabupaten}}, {{$p->proper->kecamatan}}</td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Nego</td>
                                                <td>
                                                    @if($p->proper->iklan->nego == 0)
                                                    Iya
                                                    @else
                                                    Tidak
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table class="table table-striped table-hover ">
                                        <tbody>
                                            <h6>Detail Bukti Pembayaran</h6>
                                            <tr>
                                                <td width="250px">Tanggal</td>
                                                <td>
                                                    <?php
                                                    $date = new DateTime($p->bukti->created_at);
                                                    echo $date->format('d F Y');
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Jumlah Nominal</td>
                                                <td>
                                                    <?php 		
                                                        echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->bukti->nominal)),3)));
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Catatan</td>
                                                <td>{{$p->bukti->catatan}}</td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Bukti Pembayaran</td>
                                                    <td><a href="assets/img/bukti.jpg" target="_blank">
                                                        <img class="thumbnail zoom" src="{{ URL::to('/') }}/bukti/{{ $p->bukti->bukti }}" width="200">
                                                        </a>
                                                    </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-right ">
                                        <form action="{{route('verifBayar', $p->id)}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-success mr-1">Verifikasi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
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