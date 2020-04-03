<!DOCTYPE html>
<html lang="EN" class="no-js">

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
	<title>About Us</title>

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
						<a href="/utama"><img src="assets/img/logo-nav.png" alt="" title="" /></a>
					</div>
					<nav id="nav-menu-container">
						<ul class="nav-menu">
                            <li><a href="/utama">utama</a></li>
							<li><a href="/properties">iklan</a></li>
							<li class="menu-active"><a href="/about">tentang</a></li>
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
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex text-center align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<p class="text-white link-nav"><a href="/utama">Utama </a> <span class="lnr lnr-arrow-right"></span> <a href="about.html">
							Tentang Kami</a></p>
					<h1 class="text-white">
						Tentang Kami
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start About Area -->
	<section class="about-area section-gap bg-white">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Tentang <b>Proper</b> 
						{{-- <span> <i class="fa fa-cubes"></i></span> --}}
					</h1>
				</div>
			</div>
			<div class="row d-flex justify-content-end align-items-center">
				<div class="col-lg-6 about-right no-padding">
					<img class="img-fluid" src="assets/img/logo1.png" alt="">
				</div>
				<div class="col-lg-6">
					<div class="single-about">
					<p>Proper merupakan Sistem Informasi berbasis web yang memberikan informasi-informasi 
						serta perikanan tentang Properti</p><br>
					<p>Untuk saat ini properti yang ada dalam <b>PROPER</b> terapat 6 jenis yaitu :</p>
					<p>Rumah, Apartemen, Kos, Tanah, Ruko, dan Toko/Kios.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Area -->

	<!-- Start testomial Area -->
	<section class="testomial-area section-gap">
		<div class="container">
		<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 single-blog">
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
						<h4>Dukungan 24 Jam</h4>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 single-blog">
					<div class="single-testimonial item">
						<img class="mx-auto rounded-circle" src="assets/img/nego.jpg" alt="">
						<p class="desc">
							Fitur nego untuk menawar harga
						</p>
						<h4>Fitur Nego</h4>
					</div>
			</div>
		</div>
	</section>
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
</body>
</html>