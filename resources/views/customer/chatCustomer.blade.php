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
                            Pesan Anda
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
                    <img src="assets/img/blog/c5.jpg">
                </div>
                <div class="info">
                    <a class="" href="cek">
                        <span>
                            Fajar Bayu
                                <span class="user-level">Pengguna</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a href="dashboard">
                        <i class="la la-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="iklan">
                        <i class="la la-tags"></i>
                        <p>Daftar Iklan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="grafik">
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
                            <li class="nav-item">
                                <a href="chatAdmin">
                                    <span class="link-collapse">Pesan Admin</span>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a href="chatCustomer">
                                    <span class="link-collapse">Pesan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="pembelian">
                        <i class="la la-dollar"></i>
                        <p>Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="penjualan">
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
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Pesan Anda
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chat-history" style="background-color: #f6f6f6; height:230px; padding:20px 5px">
                                    <div class="incoming_msg">
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>Hallo.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p>Hallo juga</p>
                                        </div>
                                    </div>
                                </div> <!-- end chat-history -->
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control form-control" id="defaultInput" placeholder="Masukan pesan anda">
                            </div>
                            <div class="card-body">
                                <button class="btn btn-success float-right">Kirim</button>
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
    <!-- Modal -->
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
                </div>
                <div class="modal-body text-center">
                    <p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
                    <p>
                        <b>We'll let you know when it's done</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection