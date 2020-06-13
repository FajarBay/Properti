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
                    <li class="nav-item  active">
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
                            <div class="col-md-12">
                                @foreach($transaksi as $p)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Detail Penjualan
                                            <?php
                                                if($p->konf_admin == 0){
                                                    echo "<span class=\"badge badge-warning float-right\">Menunggu Konfirmasi Admin</span>";
                                                }else{
                                                    echo "<span class=\"badge badge-success float-right\">Dikonfirmasi</span>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class=" card-body table-responsive ">
                                        <table class="table table-striped table-hover ">
                                            <tbody>
                                                <tr>
                                                    <td width="250px">Nomor Invoice</td>
                                                    <td>{{$p->invoice}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="250px">Pembeli</td>
                                                    <td><a href="">{{$p->pembeli->name}}</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="250px">Judul Iklan</td>
                                                    <td><a href="{{route('lihat', $p->proper->id)}}">{{$p->proper->nama_prop}}</a></td>
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
                                                    <td width="250px">Status Pembayaran</td>
                                                    <td>
                                                        <?php
                                                            $hasil = $p->proper->harga - $p->nominal;
                                                            if($hasil != 0){
                                                                echo "<span class=\"badge badge-warning\">Belum Lunas</span>";
                                                            }else{
                                                                echo "<span class=\"badge badge-success\">Lunas</span>";
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="250px">Jumlah Yang Belum Dibayar</td>
                                                    <td>
                                                        <?php
                                                        $hasil = $p->proper->harga - $p->nominal;
                                                            if($hasil == 0){
                                                                echo '-';
                                                            }else{
                                                                echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($hasil)),3)));
                                                            }
                                                        ?>
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
                                                    $date = new DateTime($p->created_at);
                                                    echo $date->format('d F Y');
                                                    ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="250px">Jumlah Nominal</td>
                                                    <td>
                                                        <?php 		
                                                        echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->nominal)),3)));
                                                    ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="250px">Catatan</td>
                                                    <td>{{$p->catatan}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="250px">Bukti Pembayaran</td>
                                                    <td><a href="assets/img/bukti.jpg" target="_blank">
                                                        <img class="thumbnail zoom" src="{{ URL::to('/') }}/bukti/{{ $p->bukti }}" width="200">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right" style="display:flex; float:right">
                                            <form action="{{route('verifikasiPenjualan', $p->id)}}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-success mr-1">Verifikasi</button>
                                            </form>
                                            <a href="editIklan.html">
                                                <button class="btn btn-danger ">Kembali</button>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                                @endforeach
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
</div>
    @endsection