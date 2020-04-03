<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Icons - Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="asset/css/ready.css">
    <link rel="stylesheet" href="asset/css/demo.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
                            <a class="nav-link" href="/laporan" role="button">
                                Laporan
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
                        <img src="asset/img/profile.jpg">
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
                        <a href="/adminChat">
                            <i class="la la-envelope-o"></i>
                            <p>Pesan</p>
                        </a>
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
                            <p>Pembayaran</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="laporan">
                            <i class="la la-file-pdf-o"></i>
                            <p>Laporan</p>
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
                                    <div class="card-title">Laporan</div>
                                </div>
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td width="150px">Nama</td>
                                                    <td width="20px">:</td>
                                                    <td>
                                                        <input class="form-control" id="datepicker"/>
                                                        <script>
                                                            $('#datepicker').datepicker({
                                                                uiLibrary: 'bootstrap4'
                                                            });
                                                        </script>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="150px">Nomor Telepon</td>
                                                    <td width="20px">:</td>
                                                    <td><input class="form-control" id="datepicker1"/>
                                                        <script>
                                                            $('#datepicker1').datepicker({
                                                                uiLibrary: 'bootstrap4'
                                                            });
                                                        </script>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="150px">Provinsi</td>
                                                    <td width="20px">:</td>
                                                    <td>
                                                        <select class="form-control" id="propinsi">
                                                            <option selected="" value="">-- Pilih Provinsi --</option>
                                                        </select>
                                                        <input id="prop" type="hidden" name="provinsi" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="150px">Kabupaten</td>
                                                    <td width="20px">:</td>
                                                    <td>
                                                        <select class="form-control" id="kabupaten">
                                                            <option selected="" value="">-- Pilih Kabupaten --</option>
                                                        </select>
                                                        <input id="kab" type="hidden" name="kabupaten" value="">  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="150px">Kecamatan</td>
                                                    <td width="20px">:</td>
                                                    <td>
                                                        <select class="form-control" id="kecamatan">
                                                            <option selected="" value="">-- Pilih Kecamatan --</option>
                                                        </select>
                                                        <input id="kec" type="hidden" name="kecamatan" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="150px">Foto KTP</td>
                                                    <td width="20px">:</td>
                                                    <td>
                                                        <input type="file" name="ktp" /></br>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            <a href="/cek">
                                                <button class="btn btn-danger">Batal</button>
                                            </a>
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
</body>
<script src="asset/js/core/jquery.3.2.1.min.js"></script>
<script src="asset/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="asset/js/core/popper.min.js"></script>
<script src="asset/js/core/bootstrap.min.js"></script>
<script src="asset/js/plugin/chartist/chartist.min.js"></script>
<script src="asset/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="asset/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="asset/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="asset/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="asset/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="asset/js/plugin/chart-circle/circles.min.js"></script>
<script src="asset/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="asset/js/ready.min.js"></script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

</html>