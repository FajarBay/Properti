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
                                    <a href="/chatAdmin">
                                        <span class="link-collapse">Admin Message</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/chatCustomer">
                                        <span class="link-collapse">Customers Message</span>
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
                        <div class="col-md-12">
                            @foreach($properti as $p)
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Detail Pemesanan
                                        <!-- <span class="badge badge-warning float-right">Menunggu</span> -->
                                        <!-- <span class="badge badge-success float-right">Aktif</span> -->
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
                                                <td width="250px">Penjual</td>
                                                <td><a style="text-decoration: none;" href="">{{$p->user->name}}</a></td>
                                                {{-- {{route('detailUser', $p->user->id)}} --}}
                                            </tr>
                                            <tr>
                                                <td width="250px">Judul Iklan</td>
                                                <td>
                                                    <form id="kirim" action="{{route('lihat', $p->id)}}" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="dilihat" value="{{$p->iklan->dilihat+1}}">
                                                        <input class="sub" type="submit" value="{{$p->nama_prop}}"></button>
                                                    </form>
                                                    {{--  <a href="{{route('lihat', $p->id)}}">{{$p->nama_prop}}</a>  --}}
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
                                                <td>Alamat</td>
                                                <td>{{$p->provinsi}}, {{$p->kabupaten}}, {{$p->kecamatan}}</td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Alamat Lengkap</td>
                                                <td>{{$p->alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Jenis Iklan</td>
                                                <td>
                                                    <?php
                                                        if($p->iklan->nego == 0){
                                                            echo 'Ya';
                                                        }else {
                                                            echo 'Tidak';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-right" style="display:flex; float:right">
                                @if ($trans === null)
                                <form action="{{route('pembayaran', $p->id)}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_prop" value="{{$p->id}}">
                                        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="id_penjual" value="{{$p->id_user}}">
                                        <input type="hidden" class="form-control" name="invoice" value="<?php echo 'INV//'.rand(10000,99999). '//'. date("dmY");?>">
                                        <input type="hidden" name="konf_penjual" value="0">
                                        <input type="hidden" name="konf_admin" value="0">
                                        <button type="submit" class="btn btn-success mr-1">Bayar</button>
                                </form>
                                @else
                                    <form action="{{route('pembayaranLagi', $trans->id)}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-success mr-1">Bayar</button>
                                    </form>
                                @endif
                                        <form action="{{route('batalkan', $p->id)}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger ">Batalkan Pemesanan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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