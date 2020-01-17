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
	<title>Holmes Real Estate</title>

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
						<li><a href="#">Sell / Rent Property</a></li>
						@guest
                        <li><a href="{{ route('login') }}">login</a></li>
						@if (Route::has('register'))
                        <li><a href="{{ route('register') }}">register</a></li>
						@endif
						@else
						<li><a href="/dashboard">Halo {{ Auth::user()->name }}</a></li>
						<li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
							<li class="menu-active"><a href="/utama">home</a></li>
							<li><a href="/properties">properties</a></li>
							<li><a href="/about">about</a></li>
							<li><a href="/contact">Contact</a></li>
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
				<div class="banner-content col-lg-8 col-md-6">
				<h1>PROPERTY <b>ADVERTISEMENTS</b></h1>
					<form class="form-inline">
						<div class="input-group md-form form-sm form-2 mb-100 col-lg-12">
							<input type="input" class="form-control app-select" name="cari properti" placeholder="Cari properti">
							<button class="primary-btn ml-10" type="submit">Search Properties<span class="lnr lnr-arrow-right"></span></button>
						</div>
					</form>
					
					
					<!-- <div class="search-field">
						<form class="search-form" action="#">
							<div class="row">
								<div class="col-lg-12 d-flex align-items-center justify-content-center toggle-wrap">
									<div class="row">
										<div class="col">
											<h4 class="search-title">Search Properties For</h4>
										</div>
										<div class="col">
											<div class="onoffswitch3 d-block mx-auto">
												<input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
												<label class="onoffswitch3-label" for="myonoffswitch3">
													<span class="onoffswitch3-inner">
														<span class="onoffswitch3-active">
															<span class="onoffswitch3-switch">Sell</span>
															<span class="lnr lnr-arrow-right"></span>
														</span>
														<span class="onoffswitch3-inactive">
															<span class="lnr lnr-arrow-left"></span>
															<span class="onoffswitch3-switch">Rent</span>
														</span>
													</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<select name="location" class="app-select form-control" required>
										<option data-display="Choose locations">Choose locations</option>
										<option value="1">Jakarta</option>
										<option value="2">Bandung</option>
										<option value="3">Yogyakarta</option>
										<option value="4">Semarang</option>
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<select name="property-type" class="app-select form-control" required>
										<option data-display="Property Type">Property Type</option>
										<option value="1">Property type 1</option>
										<option value="2">Property type 2</option>
										<option value="3">Property type 3</option>
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<select name="bedroom" class="app-select form-control" required>
										<option data-display="Bedrooms">Bedrooms</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
										<option value="3">Four</option>
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<select name="bedroom" class="app-select form-control" required>
										<option data-display="Bedrooms">Bedrooms</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
								<div class="col-lg-4 range-wrap">
									<p>Price Range($):</p>
									<input type="text" id="range" value="" name="range" />
								</div>
								<div class="col-lg-4 range-wrap">
									<p>Area Range(sqm):</p>
									<input type="text" id="range2" value="" name="range" />
								</div>
								<div class="col-lg-4 d-flex justify-content-end">
									<button class="primary-btn">Search Properties<span class="lnr lnr-arrow-right"></span></button>
								</div>
							</div>
						</form>
					</div> -->
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start property Area -->
	<section class="property-area section-gap relative" id="property">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Rekomendadi <b>Properti</b></h1>
					<p>
						Rekomendadi properti untuk anda hari ini
					</p>
				</div>
			</div>
			<div class="row">
			<div class="col-lg-4">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="assets/img/s2.jpg" alt="">
							<span>For Sale</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="#">Rumah Baru</a></h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p>Harga : Rp 350.000.000	</p>
								</div>
								<div class="d-flex justify-content-start">
									<p>Alamat : Yogyakarta, Indonesia</p>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>Rumah</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="assets/img/s1.jpg" alt="">
							<span>For Sale</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="#">Kos Putri</a></h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p>Harga : Rp 8.000.000	</p>
								</div>
								<div class="d-flex justify-content-start">
									<p>Alamat : Yogyakarta, Indonesia</p>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>Kos</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="assets/img/s3.jpg" alt="">
							<span>For Rent</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="#">Kos Putra</a></h4>
							</div>
							<div class="middle">
								<div class="justify-content-start">
									<p>Harga : Rp 5.000.000	</p>
								</div>
								<div class="justify-content-start">
									<p>Alamat : Yogyakarta, Indonesia</p>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>Kos</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End property Area -->

	<!-- Start About Area -->
	<section class="about-area">
		<div class="container-fluid">
			<div class="row d-flex justify-content-end align-items-center">
				<div class="col-lg-6 about-left">
					<div class="single-about">
						<h4>Pasang Iklan Anda</h4>
						<p>
							Pasang iklan properti anda sekarang! Gratis!
						</p>
					</div>
					<div class="single-about">
					<button class="primary-btn" type="submit">Pasang Iklan Sekarang<span class="lnr lnr-arrow-right"></span></button>
					</div>
				</div>
				<div class="col-lg-6 about-right no-padding">
					<img class="img-fluid" src="assets/img/p2.jpg" alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- End About Area -->

	<!-- Start city Area -->
	<section class="city-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Properties in Various Cities</h1>
					<p>
						Who are in extremely love with eco friendly system.
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

	<!-- Start testomial Area -->
	<!-- <section class="testomial-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Feedback from our real clients</h1>
					<p>
						It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game,
					</p>
				</div>
			</div>
			<div class="row">
				<div class="active-testimonial-carusel">
					<div class="single-testimonial item">
						<img class="mx-auto rounded-circle" src="assets/img/trust.jpg" alt="">
						<p class="desc">
							Iklan yang ditampilkan terpercaya
						</p>
						<h4>Iklan Terpercaya</h4>
					</div>
					<div class="single-testimonial item">
						<img class="mx-auto rounded-circle" src="assets/img/online.jpg" alt="">
						<p class="desc">
							Layanan online selama 24 jam
						</p>
						<h4>24 Jam Support</h4>
					</div>
					<div class="single-testimonial item">
						<img class="mx-auto rounded-circle" src="assets/img/nego.jpg" alt="">
						<p class="desc">
							Fitur nego untuk menawar harga
						</p>
						<h4>Fitur Nego</h4>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<section class="blog-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Feedback from our real clients</h1>
					<p>
						It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game,
					</p>
				</div>
			</div>
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
						<h4>24 Jam Support</h4>
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

	<!-- Start blog Area -->
	
	<!-- End blog Area -->

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
						<h6>Web <b style="font-size:14px">Information</b></h6>
						<ul class="instafeed d-flex flex-wrap">
							<div class="mr-20 ml-10">
							<i class="lnr lnr-phone-handset"></i>
							</div>
							<div><b style="font-size:16px; color:#fff">Phone Number</b>
								<p>+62 838 9771 0862</p>
							</div>
						</ul>
						<ul class="instafeed d-flex flex-wrap">
							<div class="mr-20 ml-10">
							<i class="lnr lnr-envelope"></i>
							</div>
							<div><b style="font-size:16px; color:#fff">Email Address</b>
								<p>Email :<a href="mailto:proper@gmail.com"> proper@gmail.com</a></p>
							</div>
						</ul>
						<ul class="instafeed d-flex flex-wrap">
							<div class="mr-20 ml-10">
							<i class="lnr lnr-home"></i>
							</div>
							<div><b style="font-size:16px; color:#fff">Location</b>
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