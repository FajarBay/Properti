@extends('layouts.adminBase')

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
                    <li class="nav-item">
                        <a href="adminDash">
                            <i class="la la-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="daftarIklan">
                            <i class="la la-tags"></i>
                            <p>Daftar Iklan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="daftarUser">
                            <i class="la la-users"></i>
                            <p>Daftar User</p>
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
                                <li class="nav-item active">
                                    <a href="adminChat">
                                        <span class="link-collapse">Admin Message</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="cusChat">
                                        <span class="link-collapse">Customers Message</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="daftarKategori">
                            <i class="la la-newspaper-o"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="daftarPembayaran">
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
                            <p>Logout</p>
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
                    <h4 class="page-title">Admin Message</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Daftar Pembelian
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
                                    <input type="text" class="form-control input-full" id="defaultInput" placeholder="Default Input">
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-primary">Send</button>
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