<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="assets/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Properties</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="assets/css/linearicons.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="assets/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header class="default-header">
		<div class="menutop-wrap">
			<div class="menu-top container">
				<div class="d-flex justify-content-end align-items-center">
					<ul class="list">
						<li><a href="tel:++6283897710862">+62 838 9771 0862</a></li>
						<li><a href="/iklan">Jual / Sewa Properti</a></li>
						@guest
                        <li><a href="{{ route('login') }}">masuk</a></li>
						@if (Route::has('register'))
                        <li><a href="{{ route('register') }}">daftar </a></li>
						@endif
						@else
						<li><a href="/dashboard">Halo, {{ Auth::user()->name }}</a></li>
						<li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
						</li>
                        @endguest
						<ul class="hidden"></ul>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-menu">
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
						<a href="index.html"><img src="assets/img/logo-nav.png" alt="" title="" /></a>
					</div>
					<nav id="nav-menu-container">
						<ul class="nav-menu">
                            <li><a href="/utama">utama</a></li>
							<li class="menu-active"><a href="/properties">iklan</a></li>
							<li><a href="/about">tentang</a></li>
							<li><a href="/contact">kontak</a></li>
						</ul>
					</nav>
					<!--######## #nav-menu-container -->
				</div>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="home-banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row fullscreen align-items-end justify-content-center">
				<div class="banner-content col-lg-12 col-md-12">
					<h1>IKLAN <b>PROPERTI</b></h1>
					<div class="search-field">
						<form class="search-form" action="#">
							<div class="row">
								<div class="col-lg-12 d-flex align-items-center justify-content-center toggle-wrap">
									<div class="row">
										<div class="col">
											<h4 class="search-title">Cari Properti Berdasarkan</h4>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<select class="app-select form-control" id="propinsi">
										<option selected="" value="">-- Pilih Provinsi --</option>
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<select name="bedroom" class="app-select form-control" required>
										<option data-display="Kategori">Kategori</option>
										<option value="1">Rumah</option>
										<option value="2">Kos</option>
										<option value="3">Apartemen</option>
										<option value="3">Tanah</option>
										<option value="3">Ruko</option>
										<option value="3">Toko/Kios</option>
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<select name="bedroom" class="app-select form-control" required>
										<option data-display="Jenis Properti">Jenis Properti</option>
										<option value="1">Jual</option>
										<option value="2">Sewa</option>
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<select name="bedroom" class="app-select form-control" required>
										<option data-display="Urutkan">Urutkan</option>
										<option value="1">Terbaru</option>
										<option value="2">Harga Tertinggi</option>
										<option value="3">Harga Terendah</option>
									</select>
								</div>
								<div class="col-lg-3 range-wrap"><br><br>
									<select name="bedroom" class="app-select form-control" required>
										<option data-display="Nego">Nego</option>
										<option value="1">Ya</option>
										<option value="2">Tidak</option>
									</select>
								</div>
								<div class="col-lg-3 range-wrap"><br><br>
									<input type="input" class="form-control app-select" name="max" placeholder="Harga Maksimal">
									{{-- <p class="small">Harga Maksimal</p> --}}
								</div>
								<div class="col-lg-3 range-wrap"><br><br>
									<input type="input" class="form-control app-select" name="max" placeholder="Harga Maksimal">
									{{-- <p class="small">Harga Maksimal</p> --}}
								</div>
								<div class="col-lg-3 d-flex justify-content-end">
									<a href="/properties1">
									<button class="primary-btn">Cari<span class="lnr lnr-arrow-right"></span></button>
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start banner Area -->
	<!-- End banner Area -->

	<!-- Start property Area -->
	<section class="property-area section-gap relative" id="property">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Hasil <b>Penelusuran</b></h1>
					<p>
						Rekomendasi properti untuk anda hari ini
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 card-body">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="assets/img/s3.jpg" alt="">
							<span>Jual</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="/iklans">Kontrakan Damai</a></h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p>Harga : Rp 25.000.000</p>
								</div>
								<div class="d-flex justify-content-start">
									<p>Alamat : Depok, Sleman, Yogyakarta</p>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>Rumah</p>
							</div>
						</div>
					</div>
                </div>
                <div class="col-lg-4 card-body">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="assets/img/s1.jpg" alt="">
							<span>Jual</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="/iklans">Apartemen Uttara</a></h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p>Harga : Rp 20.000.000</p>
								</div>
								<div class="d-flex justify-content-start">
									<p>Alamat : Depok, SLeman, Yogyakarta</p>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>Apartemen</p>
							</div>
						</div>
					</div>
                </div>
                <div class="col-lg-4 card-body">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="assets/img/s2.jpg" alt="">
							<span>Jual</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="/iklans">Kos Putri</a></h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p>Harga : Rp 10.000.000</p>
								</div>
								<div class="d-flex justify-content-start">
									<p>Alamat : Pabelan, Semarang, Jawa Tengah</p>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>Kos</p>
							</div>
						</div>
					</div>
                </div>
                <div class="col-lg-4 card-body">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="assets/img/s1.jpg" alt="">
							<span>Jual</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="/iklans">Apartemen Melati</a></h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p>Harga : Rp 15.000.000</p>
								</div>
								<div class="d-flex justify-content-start">
									<p>Alamat : Depok, Sleman, Yogyakarta</p>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>Apartemen</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-body">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="assets/img/s2.jpg" alt="">
							<span>Sewa</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="/iklans">Rumah Baru</a></h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p>Harga : Rp 400.000.000	</p>
								</div>
								<div class="d-flex justify-content-start">
									<p>Alamat : Bawen, Semarang, Jawa Tengah</p>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>Rumah</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-body">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="assets/img/s3.jpg" alt="">
							<span>Sewa</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="/iklans">Kos Putra</a></h4>
							</div>
							<div class="middle">
								<div class="justify-content-start">
									<p>Harga : Rp 5.000.000	</p>
								</div>
								<div class="justify-content-start">
									<p>Alamat : Majalaya, Bandung, Jawa Barat</p>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>Kos</p>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <div class="card-body d-flex justify-content-center">
            <p class="demo text-center">
                <ul class="pagination pg-danger">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </p>
        </div>
	</section>
	<!-- End property Area -->

	<!-- Start city Area -->
	<section class="city-area section-gap-bottom">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Properti Berdasarkan <b>Kota</b></h1>
					<p>
						Pilih kota untuk mencari properti
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 mb-10">
					<div class="content">
						<a href="#" target="_blank">
							<div class="content-overlay"></div>
							<img class="content-image img-fluid d-block mx-auto" src="assets/img/jakarta.jpg" alt="">
							<div class="content-details fadeIn-bottom">
								<h3 class="content-title">Jakarta</h3>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 mb-10">
					<div class="content">
						<a href="#" target="_blank">
							<div class="content-overlay"></div>
							<img class="content-image img-fluid d-block mx-auto" src="assets/img/bandung.jpg" alt="">
							<div class="content-details fadeIn-bottom">
								<h3 class="content-title">Bandung</h3>
							</div>
						</a>
					</div>
					<div class="row city-bottom">
						<div class="col-lg-6 col-md-6 mt-30">
							<div class="content">
								<a href="#" target="_blank">
									<div class="content-overlay"></div>
									<img class="content-image img-fluid d-block mx-auto" src="assets/img/jogja.jpeg" alt="">
									<div class="content-details fadeIn-bottom">
										<h3 class="content-title">Yogyakarta</h3>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 mt-30">
							<div class="content">
								<a href="#" target="_blank">
									<div class="content-overlay"></div>
									<img class="content-image img-fluid d-block mx-auto" src="assets/img/semarang.jpg" alt="">
									<div class="content-details fadeIn-bottom">
										<h3 class="content-title">Semarang</h3>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End city Area -->

	<!-- start footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Proper <i class="fa fa-cubes" aria-hidden="true"></i></h6>
						<p>
							Sistem Informasi Penjualan Properti
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Informasi <b style="font-size:14px">Properti</b></h6>
						<ul class="nav-menui">
							<li><a href="">Perumahan</a></li>
							<li><a href="">Pertanahan</a></li>
							<li><a href="">Apartement</a></li>
							<li><a href="">Kos-kosan</a></li>
							<li><a href="">Pertokoan</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Informasi <b style="font-size:14px">Web</b></h6>
						<ul class="instafeed d-flex flex-wrap">
							<div class="mr-20 ml-10">
							<i class="lnr lnr-phone-handset"></i>
							</div>
							<div><b style="font-size:16px; color:#fff">Nomor Telepon</b>
								<p>+62 838 9771 0862</p>
							</div>
						</ul>
						<ul class="instafeed d-flex flex-wrap">
							<div class="mr-20 ml-10">
							<i class="lnr lnr-envelope"></i>
							</div>
							<div><b style="font-size:16px; color:#fff">Alamat Email</b>
								<p>Email :<a href="mailto:proper@gmail.com"> proper@gmail.com</a></p>
							</div>
						</ul>
						<ul class="instafeed d-flex flex-wrap">
							<div class="mr-20 ml-10">
							<i class="lnr lnr-home"></i>
							</div>
							<div><b style="font-size:16px; color:#fff">Lokasi</b>
								<p>D.I. Yogyakarta, Indonesia</p>
							</div>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/jquery.ajaxchimp.min.js"></script>
	<script src="assets/js/jquery.nice-select.min.js"></script>
	<script src="assets/js/jquery.sticky.js"></script>
	<script src="assets/js/ion.rangeSlider.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script type="text/javascript">
    var return_first = function() {
        var tmp = null;
        $.ajax({
            'async': false,
            'type': "get",
            'global': false,
            'dataType': 'json',
            'url': 'https://x.rajaapi.com/poe',
            'success': function(data) {
                tmp = data.token;
            }
        });
        return tmp;
    }();
$(document).ready(function() {
    $.ajax({
        url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
        type: 'GET',
        dataType: 'json',
        success: function(json) {
            if (json.code == 200) {
                for (i = 0; i < Object.keys(json.data).length; i++) {
                    $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      console.log(json.data[i]); 
                }
                
              //   $('#prop').append($('<option>').text('value'.json.data[i].name);
            } else {
                $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
            }
        }
    });
    $("#propinsi").change(function() {
        var propinsi = $("#propinsi").val();
        var prop = $("#propinsi").find(":selected").text();
        $.ajax({
            url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
            data: "idpropinsi=" + propinsi,
            type: 'GET',
            cache: false,
            dataType: 'json',
            success: function(json) {
                $("#kabupaten").html('');
                if (json.code == 200) {
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                        $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                          // $('#kab').append($('<option>').text('value'.json.data[i].name);
                              console.log(prop);
                              $( "#prop" ).val( prop );
                    }
                    $('#kecamatan').html($('<option>').text('-- Pilih Kecamatan --').attr('value', '-- Pilih Kecamatan --'));
                    $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));

                } else {
                    $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
            }
        });
    });
    $("#kabupaten").change(function() {
        var kabupaten = $("#kabupaten").val();
        var kab = $("#kabupaten").find(":selected").text();
        $.ajax({
            url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kecamatan',
            data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi,
            type: 'GET',
            cache: false,
            dataType: 'json',
            success: function(json) {
                $("#kecamatan").html('');
                if (json.code == 200) {
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                        $('#kecamatan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                          // $('#kec').append($('<option>').text('value'.json.data[i].name);
                              console.log(kab);
                              $( "#kab" ).val( kab );
                    }
                    $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));
                    
                } else {
                    $('#kecamatan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
            }
        });
    });
    $("#kecamatan").change(function() {
        var kecamatan = $("#kecamatan").val();
        var kec = $("#kecamatan").find(":selected").text();
        $.ajax({
            url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kelurahan',
            data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi + "&idkecamatan=" + kecamatan,
            type: 'GET',
            dataType: 'json',
            cache: false,
            success: function(json) {
                $("#kelurahan").html('');
                if (json.code == 200) {
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                        $('#kelurahan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                          console.log(kec);
                          $( "#kec" ).val( kec );
                    }
                } else {
                    $('#kelurahan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                }
            }
        });
    });
});
</script>
</body>

</html>