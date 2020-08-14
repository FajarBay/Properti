@extends('layouts.landing')

@section('content')
	<!-- Start Header Area -->
	<header class="default-header">
		<div class="menutop-wrap">
			<div class="menu-top container">
				<div class="d-flex justify-content-end align-items-center">
					<ul class="list">
						<li><a href="tel:++6283897710862">+62 838 9771 0862</a></li>
						<?php
							if(Auth::check()){
								echo '<li><a href="/iklan">Jual / Sewa Properti</a></li>';
							}else {
								echo '<li><a href="#" data-toggle="modal" data-target="#exampleModal">Jual / Sewa Properti</a></li>';
							}
						?>
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
							<li><a href="/properties">iklan</a></li>
							<li><a href="/about">tentang</a></li>
							<li class="menu-active"><a href="/contact">kontak</a></li>
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
					<p class="text-white link-nav"><a href="index.html">Utama </a>
						<span class="lnr lnr-arrow-right"></span> <a href="/contact">
							Hubungi Kami</a></p>
					<h1 class="text-white">
						Hubungi Kami
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Anda Belum <b>Masuk!</b></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
				<p>Untuk memasang iklan, anda harus memiliki akun terlebih dahulu.</p>
				<p>Apakah anda sudah memiliki akun? Jika iya, klik tombol <b>Masuk</b></p>
				<p>Jika belum, klik tombol <b>Daftar</b></p>
			</div>
			<div class="modal-footer justify-content-center">
			<a href="{{ route('login') }}"><button type="button" class="btn btn-danger">Masuk</button></a>
			<a href="{{ route('register') }}"><button type="submit" class="btn btn-secondary">Daftar</button></a>
			</div>
		</div>
		</div>
	</div>

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Informsi Lebih <b>Lanjut</b></h1>
					<p>
						Hubungi kami untuk mendapatkan informasi lebih lanjut
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h3>D.I. Yogyakarta, Indonesia</h3>
							<p>SV UGM</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h3><a href="sms:+6283897710862" style="color: #222222;">+62 838 9771 0862</a></h3>
							<p>Senin sampai Jumat, Pukul 9 pagi sampai 6 sore</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h3><a href="mailto:proper@gmail.com" style="color: #222222;">proper@gmail.com</a></h3>
							<p>Hubungi kami lewat email kapanpun</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 about-right no-padding">
					<img class="img-fluid" src="assets/img/logo1.png" alt="">
				</div>
			</div>
		</div>
	</section>

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
	<!-- End contact-page Area -->

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
							@foreach($kat as $k)
							<li><a href="">{{$k->nama_kat}}</a></li>
							@endforeach
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
	@endsection