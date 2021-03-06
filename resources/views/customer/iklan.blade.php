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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Daftar Iklan Anda
                                        @if(Auth::user()->profil == null || Auth::user()->ktp == null || Auth::user()->provinsi == null ||
                                        Auth::user()->kabupaten == null || Auth::user()->kecamatan == null || Auth::user()->bank == null ||
                                        Auth::user()->no_rek == null)
                                        <button class="btn btn-success" data-toggle="modal" data-target="#lengkapi">+ Tambah</button>
                                        @else
                                        <a href="/properti2">
                                            <button class="btn btn-success">+ Tambah</button>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-head-bg-danger table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Terjual</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = ($data->currentpage()-1) * $data->perPage() + 1; @endphp
                                            @forelse($data as $d)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$d->nama_prop}}</td>
                                                <td>
                                                    {{$d->kategori->nama_kat}}
                                                </td>
                                                <td>
                                                    <?php 		
                                                        echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($d->harga)),3)));
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($d->sold == 0) {
                                                        echo "Belum Terjual";
                                                    }else if($d->sold == 1){
                                                        echo "Terjual";
                                                    }
                                                ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($d->status == 0){
                                                        echo "Menunggu";
                                                        }else {
                                                        echo "Aktif";
                                                        }
                                                    ?>   
                                                </td>
                                                {{-- <td>
                                                    <select class="form-control form-control-sm" id="smallSelect" style="width: auto;">
                                                        <option value="Belum Terjual">Belum Terjual</option>
                                                        <option value="Belum Terjual">Terjual</option>
                                                    </select>
                                                </td> --}}
                                                <td>
                                                    <a href="{{route('iklan.show', $d->id)}}">
                                                        <button class="btn btn-primary btn-xs">Detail</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="text-center" colspan="7">
                                                    <h6 class="alert alert-warning"><strong>Maaf!</strong> Belum ada data yang ditampilkan.</h6>
                                                </td>
                                            </tr> 
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $data->links("pagination::bootstrap-4") }}
                                    <div class="modal fade" id="lengkapi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Data Diri Belum Lengkap</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Untuk menambah iklan, anda harus melengkapi data diri terlebih dahulu.</p>
                                                <p>Silahkan lengkapi data diri anda pada menu <b>Profil</b></p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="/cek"><button type="button" class="btn btn-danger">Buka Profil</button></a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
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