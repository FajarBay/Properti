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
                    <a class="" href="/cek">
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
                    <li class="nav-item active">
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
                            @foreach($transaksi as $p)
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Detail Pembelian
                                        <!-- <span class="badge badge-warning float-right">Menunggu</span> -->
                                        <span class="badge badge-success float-right">Terverifikasi</span>
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
                                                <td width="250px">Nomor Transaksi</td>
                                                <td>{{$p->invoice}}</td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Penjual</td>
                                                <td><a href="">{{$p->penjual->name}}</a></td>
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
                                                <td width="250px">konfirmasi Penjual</td>
                                                <td>
                                                    <?php
                                                    if ($p->konf_penjual == 1){
                                                        echo 'Dikonfirmasi';
                                                    }else{
                                                        echo 'Belum Dikonfirmasi';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Konfirmasi Admin</td>
                                                <td>
                                                    <?php
                                                    if ($p->konf_admin == 1){
                                                        echo 'Dikonfirmasi';
                                                    }else{
                                                        echo 'Belum Dikonfirmasi';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="250px">Nego</td>
                                                <td>
                                                    <?php
                                                    if ($p->proper->iklan->nego == 0){
                                                        echo 'Ya';
                                                    }else{
                                                        echo 'Tidak';
                                                    }
                                                    ?>
                                                </td>
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
                                                    $hasil = $p->proper->harga - $p->bukti->nominal;
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
                                            <br>
                                        </tbody>
                                    </table>
                                    <div class="text-right ">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#bukti">Kirim Bukti</button>
                                       
                                        <a href="editIklan.html">
                                            <button class="btn btn-warning ">Hubumgi Penjual</button>
                                        </a>
                                    </div>
                                </div>

                                <div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Kirim Bukti Pembayaran Lain</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Jumlah Nominal:</label>
                                                <input type="text" name="nominal" placeholder="Total yang harus dibayar" class="form-control" />
                                              </div>
                                              <div class="form-group">
                                                <label for="message-text" class="col-form-label">Catatan:</label>
                                                <input type="text" name="catatan" placeholder="Tambahkan catatan atau keterangan" class="form-control" />
                                              </div>
                                              <div class="form-group">
                                                <label for="message-text" class="col-form-label">Bukti Pembayaran:</label>
                                                <input class="form-control" type="file" name="bukti">
                                              </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
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