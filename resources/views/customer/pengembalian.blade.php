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
                                Pengembalian
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
                        <a href="pembelian">
                            <i class="la la-cart-plus"></i>
                            <p>Pembelian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="penjualan">
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
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Daftar Pengembalian
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <div class="container" id="myGroup">
                                        <p>
                                            <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Klaim Anda
                                            </a>
                                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                                                Permintaan Klaim
                                            </button>
                                        </p>
                                    
                                        <div class="collapse show" id="collapseExample" data-parent="#myGroup">
                                                <table class="table table-head-bg-danger table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Penjual</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{--  @if ($bukti != null)  --}}
                                                        @php $no = ($pembeli->currentpage()-1) * $pembeli->perPage() + 1; @endphp
                                                        @forelse ($pembeli as $d)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$d->proper->nama_prop}}</td>
                                                            <td>{{$d->penjual->name}}</td>
                                                            <td>
                                                                <?php
                                                                setlocale(LC_ALL, 'IND');
                                                                $date = new DateTime($d->created_at);
                                                                echo strftime("%d %B %Y", $date->getTimestamp());
                                                                ?>
                                                            </td>
                                                            @if($d->konf_admin == 0)
                                                                <td>Belum Dikonfirmasi</td>
                                                            @else
                                                                <td>Dikonfirmasi</td>
                                                            @endif
                                                            <td>
                                                                <a href="{{route('detailPengembalian', $d->id)}}">
                                                                    <button class="btn btn-primary btn-xs">Detail</button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td class="text-center" colspan="6">
                                                                <h6 class="alert alert-warning"><strong>Maaf!</strong> Belum ada data yang ditampilkan.</h6>
                                                            </td>
                                                        </tr> 
                                                        @endforelse
                                                        {{--  @else
                                                        <tr>
                                                            <td class="text-center" colspan="6">
                                                                <h6 class="alert alert-warning"><strong>Maaf!</strong> Belum ada data yang ditampilkan.</h6>
                                                            </td>
                                                        </tr> 
                                                        @endif  --}}
                                                    </tbody>
                                                </table>
                                        </div>
                                        <div class="collapse" id="collapseExample2" data-parent="#myGroup">
                                            <table class="table table-head-bg-danger table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Pembeli</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{--  @if ($bukti != null)  --}}
                                                    @php $no = ($penjual->currentpage()-1) * $penjual->perPage() + 1; @endphp
                                                    @forelse ($penjual as $d)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$d->proper->nama_prop}}</td>
                                                        <td>{{$d->Pembeli->name}}</td>
                                                        <td>
                                                            <?php
                                                            setlocale(LC_ALL, 'IND');
                                                            $date = new DateTime($d->created_at);
                                                            echo strftime("%d %B %Y", $date->getTimestamp());
                                                            ?>
                                                        </td>
                                                        @if($d->konf_admin == 0)
                                                            <td>Belum Dikonfirmasi</td>
                                                        @else
                                                            <td>Dikonfirmasi</td>
                                                        @endif
                                                        <td>
                                                            <a href="{{route('detailPengembalian', $d->id)}}">
                                                                <button class="btn btn-primary btn-xs">Detail</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td class="text-center" colspan="6">
                                                            <h6 class="alert alert-warning"><strong>Maaf!</strong> Belum ada data yang ditampilkan.</h6>
                                                        </td>
                                                    </tr> 
                                                    @endforelse
                                                    {{--  @else
                                                    <tr>
                                                        <td class="text-center" colspan="6">
                                                            <h6 class="alert alert-warning"><strong>Maaf!</strong> Belum ada data yang ditampilkan.</h6>
                                                        </td>
                                                    </tr> 
                                                    @endif  --}}
                                                </tbody>
                                            </table>
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