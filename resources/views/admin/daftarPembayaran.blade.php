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
                        <img src="{{asset ('asset/img/support.png') }}">
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
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Pembayaran
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                            Iklan Berdasarkan
                                        </button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                            <li class="nav-item dropdown hidden-caret">
                                            <a class="dropdown-item" href="/daftarPembayaran">Terbaru</a>
                                            <a class="dropdown-item" href="/terendah">Harga Terendah</a>
                                            <a class="dropdown-item" href="/tertinggi">Harga Tertinggi</a>
                                            <a class="dropdown-item" href="/sudah_konf">Dikonfirmasi</a>
                                            <a class="dropdown-item" href="belum_konf">Belum Dikonfirmasi</a>
                                        </ul>
                                    <form class="nav-search col-md-3 float-right" action="{{ route('cariTransaksi') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="cari" placeholder="Cari" class="form-control" value="{{ old('cari') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-search search-icon"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-head-bg-danger">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Invoice</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($penjualan as $p)
                                            @php $no = 1; @endphp
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$p->invoice}}</td>
                                                <td>{{$p->proper->nama_prop}}</td>
                                                <td>
                                                    <?php 		
                                                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->proper->harga)),3)));
                                                        ?> 
                                                </td>
                                                    @if($p->konf_admin == 0)
                                                        <td>Belum Dikonfirmasi</td>
                                                    @else
                                                        <td>Dikonfirmasi</td>
                                                    @endif
                                                <td>
                                                    <?php
                                                        $date = new DateTime($p->created_at);
                                                        echo $date->format('d F Y');
                                                        ?>
                                                </td>
                                                <td>
                                                    <a href="{{route('detailPembayaran', $p->id)}}">
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