<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Forms - Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="{{asset ('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset ('asset/css/ready.css') }}">
    <link rel="stylesheet" href="{{asset ('asset/css/demo.css') }}">
</head>

<body>
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
                            <a class="nav-link" href="/daftarUser" role="button">
                                Daftar User
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
                        <img src="{{asset ('asset/img/profile.jpg') }}">
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
                    <li class="nav-item  active">
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
                                    @foreach($user as $u)
                                    <div class="card-title">Informasi Pengguna
                                        <?php
                                                if($u->active == 1){
                                                   echo "<span class=\"badge badge-success float-right\">Terverifikasi</span>";
                                                }else {
                                                   echo "<span class=\"badge badge-warning float-right\">Belum Terverifikasi</span>";
                                                }
                                            ?>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    @foreach($user as $u)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="text-center mb-3">
                                                <img src="{{ URL::to('/') }}/profil/{{ $u->profil }}" class="rounded" width="150px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group has-success">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td width="150px">Nama</td>
                                                        <td width="20px">:</td>
                                                        <td>{{$u->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150px">Nomor Telepon</td>
                                                        <td width="20px">:</td>
                                                        <td>{{$u->phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150px">Alamat :</td>
                                                        <td width="20px">:</td>
                                                        <td>{{$u->provinsi}}, {{$u->kabupaten}}, {{$u->kecamatan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150px">Foto KTP</td>
                                                        <td width="20px">:</td>
                                                        <td><img alt="Product Image" width="350" height="200" src="{{ URL::to('/') }}/ktp/{{ $u->ktp }}"/></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="form-group">
                                                <?php 
                                                    if($u->active == 1){
                                                        echo "<button class=\"btn btn-warning\">Batal Verifikasi</button>";
                                                    }else{
                                                        echo "<button class=\"btn btn-success\">Verifikasi</button>";
                                                    } 
                                                ?>
                                                {{-- <a href="{{route('editProfil', $u->id)}}"> --}}
                                                    <button class="btn btn-danger">Hubungi Pengguna</button>
                                                {{-- </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
    </div>
    </div>
    <!-- Modal -->
    
</body>
<script src="{{asset ('asset/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{asset ('asset/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{asset ('asset/js/core/popper.min.js') }}"></script>
<script src="{{asset ('asset/js/core/bootstrap.min.js') }}"></script>
<script src="{{asset ('asset/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{asset ('asset/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{asset ('asset/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{asset ('asset/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{asset ('asset/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{asset ('asset/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{asset ('asset/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{asset ('asset/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{asset ('asset/js/ready.min.js') }}"></script>

</html>