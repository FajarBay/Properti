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
                    <li class="nav-item active">
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
                            @foreach($transaksi as $p)
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Detail Pembelian
                                        <?php
                                            if($p->konf_admin == 0){
                                                echo '<span class="badge badge-warning float-right">Menunggu Konfirmasi Admin</span>';
                                            }else{
                                                echo '<span class="badge badge-success float-right">Terverifikasi</span>';
                                            }
                                        ?>
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
                                                <td width="250px">Penjual</td>
                                                <td>
                                                    <form action="{{route('pesanPertama')}}" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        {{$p->penjual->name}}
                                                        <input type="hidden" name="message" value="Judul Iklan : {{$p->proper->nama_prop}}">
                                                        <input type="hidden" name="from" value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="to" value="{{$p->penjual->id}}">
                                                    <button type="submit" class="btn btn-danger btn-sm">Hubungi Penjual</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Judul Iklan</td>
                                                <td>
                                                    <form id="kirim" action="{{route('lihat', $p->proper->id)}}" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="dilihat" value="{{$p->proper->iklan->dilihat+1}}">
                                                        <input class="sub" type="submit" value="{{$p->proper->nama_prop}}"></button>
                                                    </form>
                                                    {{--  <a href="{{route('lihat', $p->proper->id)}}">{{$p->proper->nama_prop}}</a></td>  --}}
                                            </tr>
                                            <tr>
                                                <td>Nominal Transfer</td>
                                                <td>
                                                    <?php 		
                                                        echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($nominal)),3)));
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bukti</td>
                                                <td>
                                                    <img class="thumbnail zoom" src="{{ URL::to('/') }}/bukti/{{ $img }}" width="200">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Konfirmasi Admin</td>
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
                                            
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table class="table table-striped table-hover ">
                                        <tbody>
                                            <h6>Detail Bukti Pembayaran</h6>
                                            @foreach ($bukti as $b)
                                                <tr>
                                                    <td width="250px">Tanggal</td>
                                                    <td>
                                                        <?php
                                                        setlocale(LC_ALL, 'IND');
                                                        $date = new DateTime($b->created_at);
                                                        echo strftime("%d %B %Y", $date->getTimestamp());
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="250px">Jumlah Nominal</td>
                                                    <td>
                                                        <?php 		
                                                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($b->nominal)),3)));
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="250px">Catatan</td>
                                                    <td>{{$b->catatan}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="250px">Bukti Pembayaran</td>
                                                    <td><a href="assets/img/bukti.jpg" target="_blank">
                                                        <img class="thumbnail zoom" src="{{ URL::to('/') }}/bukti/{{ $b->bukti }}" width="200">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <br>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                    <div class="text-right ">
                                        @if($p->penjual->id == Auth::user()->id)
                                        <button class="btn btn-success" data-toggle="modal" data-target="#bukti">Kirim Bukti</button>
                                        @elseif($p->pembeli->id == Auth::user()->id && $p->konf_user == 0)
                                        <button class="btn btn-success" data-toggle="modal" data-target="#buka">Konfirmasi</button>
                                        @elseif($p->pembeli->id == Auth::user()->id && $p->konf_user == 1)
                                        <button class="btn btn-secondary mr-1" disabled>Sudah dikonfirmasi</button>
                                        @endif
                                    </div>
                                </div>
                                {{-- Modal Konfirmasi --}}
                                <div class="modal fade" id="buka" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <form action="{{route('verifikasiPenjualan', $p->id)}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penjualan</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>Apakah anda yakin akan mengkonfirmasi penjualan ini? Pastikan seluruh pembayaran sudah lunas</h6>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-danger">Konfirmasi</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                      </div>
                                    </div>
                                </div>
                                {{-- Modal Kirim --}}
                                <div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                    <form method="POST" action="{{route('kirim_lagi',  $p->id)}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Kirim Bukti Pembayaran Lain</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Jumlah Nominal:</label>
                                                <input type="text" name="nominal" id="input" placeholder="Total yang harus dibayar" class="form-control" autocomplete="off"/>
                                                <p class="small" >Nominal : <b><span id="rupiah"></span></b></p>
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
                                        <input type="hidden" name="id_transaksi" value="{{$p->id}}">
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-danger">Kirim</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
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