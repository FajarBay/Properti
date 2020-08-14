@extends('layouts.adminBase')

@section('content')
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <img src="asset/img/logo-nav.png">
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav md-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="/adminDash" role="button">
                                Dashboard
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
                        <img src="asset/img/support.png">
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
                    <li class="nav-item active">
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
                        <div class="col-md-3">
                            <div class="card card-stats card-warning">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Pengguna</p>
                                                <h4 class="card-title">{{ DB::table('users')->where('admin','0')->count()}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-success">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-newspaper-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Kategori</p>
                                                <h4 class="card-title">{{ DB::table('kategori')->count()}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-danger">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-tags"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Iklan</p>
                                                <h4 class="card-title">{{ DB::table('propertis')->count()}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-primary">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-money"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Transaksi</p>
                                                <h4 class="card-title">1</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">Iklan Terbaru</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-head-bg-danger table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = ($products->currentpage()-1) * $products->perPage() + 1; @endphp
                                            @foreach($products as $data)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$data->nama_prop}}</td>
                                                <td>
                                                    <?php 		
                                                    echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($data->harga)),3)));
                                                    ?>     
                                                </td>
                                                <td>
                                                    <?php
                                                        setlocale(LC_ALL, 'IND');
                                                        $date = new DateTime($data->created_at);
                                                        echo strftime("%d %B %Y", $date->getTimestamp());
                                                        ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($data->iklan->status == 0){
                                                        echo "Menunggu";
                                                        }else {
                                                        echo "Aktif";
                                                        }
                                                    ?>    
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.show', $data->id)}}">
                                                        <button class="btn btn-primary btn-xs">Detail</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $products->links("pagination::bootstrap-4") }}
                                </div>
                            </div>
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