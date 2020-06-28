<!DOCTYPE html>
<html lang="EN" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset('assets/img/fav.png') }}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>About Us</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.skinFlat.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
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
						@if (Auth::user()->name == 'admin')
						<li><a href="/adminDash">Halo, {{ Auth::user()->name }}</a></li>
						@else
						<li><a href="/dashboard">Halo, {{ Auth::user()->name }}</a></li>
						@endif
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
				</div>
			</div>
		</div>

		<div class="main-menu">
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
						<a href="/utama"><img src="assets/img/logo-nav.png" alt="" title="" /></a>
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
	<section class="about-area section-gap bg-white">
		
	</section>
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Pesan Properti</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					Apakah anda akan memesan properti ini? properti ini akan di simpan di <b>daftar pesanan</b> anda.
					Setelah memesan, harap menghubingi pemilik properti sebelum melakukan pembelian.
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Hubungi Penjual</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End banner Area -->

	<!-- Start About Area -->
	<section class="about-area section-gap bg-white">
        <div id="carouselExampleIndicators" class="carousel slide w-75 mx-auto" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" style="height: 550px;">
                <div class="carousel-item active">
                    <img class="d-block w-100 img-fluid" src="assets/img/a2.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="assets/img/a3.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="assets/img/a1.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="assets/img/a4.jpg" alt="Third slide">
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
            <br>
        </div>
        <div class="container w-75">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="single item">
                        <h3><b>Apartemen Melati</b></h3>
                        <p>Depok, Sleman, Yogyakarta</p><br>
                        <div class="f-size">
                            <h5>
                                Fasilitas
                            </h5>
                            <p>Ruang Tamu, Kamar mandi, Wifi, Dapur, AC</p><br>
                            <h5>
                                Deskripsi
                            </h5>
                            <p>Luas Ruangan 15x10, Bebas biaya listrik dan wifi, Lingkungan Sejuk, Dekat dengan Berbagai Wisata di Jogja, Lingkungan Aman Nyaman. Harga Merupakan Per tahun</p>
                            <br>
                            <h5>
                                Alamat Lengkap
                            </h5>
                            <p>Jalan Kaliurang, Catur Tunggal, Kecamatan Depok, Manggung, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
                            </p><br>
                            <!-- <h5>
                                Alamat Maps
                            </h5>
                            <p>https://goo.gl/maps/5UhDtiCq2ffMbDTG9</p> -->
                        </div>
                        <hr>
                        <h5>
                            Informasi Pemilik
                        </h5><br>
                        <div class="float-left mr-3">
                            <img class="mx-auto rounded-circle" src="assets/img/blog/c5.jpg" width="60px" height="60px">
                        </div>
                        <P class="mt-2"><b>Pemilik</b></P>
                        <p>Fajar Bayu</p><br>
                        <p>Fajar Bayu merupakan pengiklan yang Terdaftar sejak tanggal 20-09-2018.</p>
                        <p>Untuk melihat kelengkapan data dari pengiklan, Silahkan Klik <b>Lihat pengiklan.</b></p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 testimonial-carusel">
                    <div class="single-testimonial text-left card-body">
                        <p>
                            Dipasang pada tanggal 22-2-2020
                        </p>
                        <p><b>Data bisa berubah sewaktu-waktu</b></p>
                        <br>
                        <h6 style="color:black">Rp. 20.000.000 / Tahun</h6>
                        <p><i class="fa fa-check-square-o pr-2" aria-hidden="true"></i> Terverifikasi</p>
                        <p><i class="fa fa-tags pr-2" aria-hidden="true"></i> Iklan Sewa</p>
                        <p><i class="fa fa-handshake-o pr-2" aria-hidden="true"></i>Nego : Tidak</p><br>
                        <div class="text-center">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- End About Area -->

	<!-- Start testomial Area -->
	{{-- <section class="testomial-area section-gap">
		<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-12 single-blog">
				<div class="single-testimonial item">
					<img class="mx-auto rounded-circle" src="assets/img/trust.jpg" alt="">
					<p class="desc">
						Iklan yang ditampilkan terpercaya
					</p>
					<h4>Iklan Terpercaya</h4>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 single-blog">
				<div class="single-testimonial item">
					<img class="mx-auto rounded-circle" src="assets/img/online.jpg" alt="">
					<p class="desc">
						Layanan online selama 24 jam
					</p>
					<h4>24 Jam Support</h4>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- End testomial Area -->

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

	<script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}></script>
	<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}></script>
	<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}></script>
	<script src="{{ asset('assets/js/ion.rangeSlider.js') }}></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js></script>
	<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}></script>
	<script src="{{ asset('assets/js/main.js') }}></script>
</body>
</html>