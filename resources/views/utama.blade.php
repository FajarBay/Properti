@extends('layouts.landing')

@section('content')
	<!-- Start Header Area -->
	<header class="default-header">
		<div class="menutop-wrap">
			<div class="menu-top container">
				<div class="d-flex justify-content-end align-items-center">
					<ul class="list">
						@if(Session::has('message'))
						<li><a class="alert1 alert1-danger">{{Session::get('message')}}</a></li>
						@endif
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
						<a href="/utama"><img src="assets/img/logo-nav.png" alt="" title="" /></a>
					</div>
					<nav id="nav-menu-container">
						<ul class="nav-menu">
							<li class="menu-active"><a href="/utama">utama</a></li>
							<li><a href="/properties">iklan</a></li>
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
				<div class="banner-content col-lg-8 col-md-6">
				<h1>IKLAN <b>PROPERTI</b>
				{{-- <br><small><small>PASANG IKLAN PROPERTI ANDA DISINI!</small></small> --}}
				</h1>
					<form class="form-inline" action="{{ route('cariProp') }}" method="GET">
						<div class="input-group md-form form-sm form-2 mb-100 col-lg-12">
							<input type="input" class="form-control app-select" name="cari_properti" placeholder="Cari berdasarkan lokasi atau nama">
							<button class="primary-btn ml-10" type="submit">Cari<span class="lnr lnr-arrow-right"></span></button>
						</div>
					</form>
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
					<h1>Properti <b>Terbaru</b></h1>
					<p>
						Rekomendasi properti untuk anda hari ini
					</p>
				</div>
			</div>
			<div class="row">
				@foreach($data as $d)
				<div class="col-lg-4">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="/foto1/{{$d->foto1}}" alt="">
							<span>
								@if($d->iklan->jenis == 0)
									Jual
								@else
									Sewa
								@endif
							</span>
						</div>
						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4>
									<form id="kirim" action="{{route('lihat', $d->id)}}" method="post" enctype="multipart/form-data">
										{{ csrf_field() }}
										<input type="hidden" name="dilihat" value="{{$d->iklan->dilihat+1}}">
										<input class="sub" type="submit" value="{{$d->nama_prop}}"></button>
									</form>
								</h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p>Harga : 
										<?php 
										if($d->iklan->jenis == 0) {
											echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($d->harga)),3)));
										}else if($d->iklan->jenis == 1){
											echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($d->harga)),3))).' /Hari';
										}else if($d->iklan->jenis == 2){
											echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($d->harga)),3))).' /Minggu';
										}else if($d->iklan->jenis == 3){
											echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($d->harga)),3))).' /Bulan';
										}else if($d->iklan->jenis == 4){
											echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($d->harga)),3))).' /Tahun';
										}					
										// echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($d->harga)),3)));
										?>	
									</p>
								</div>
								<div class="d-flex justify-content-start">
									<small><p>Alamat : {{$d->kecamatan}}, {{$d->kabupaten}}, {{$d->provinsi}}</p></small>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>{{$d->kategori->nama_kat}}</p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
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
					<?php
					if(Auth::check()){
						echo '<a href="/properti2"><button class="primary-btn">Pasang Iklan Sekarang<span class="lnr lnr-arrow-right"></span></button></a>';
					}else {
						echo '<button class="primary-btn" data-toggle="modal" data-target="#exampleModal">Pasang Iklan Sekarang<span class="lnr lnr-arrow-right"></span></button>';
					}
					?>
					</div>
				</div>
				<div class="col-lg-6 about-right no-padding">
					<img class="img-fluid" src="assets/img/p2.jpg" alt="">
				</div>
			</div>
		</div>
	</section>
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
	<!-- Start city Area -->
	<section class="city-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Kategori <b>Properti</b></h1>
					<p>
						Jenis kategori yang tersedia
					</p>
				</div>
			</div>
			@foreach($kategori->chunk(2) as $kat)
            <div class="row d-flex justify-content-end align-items-center">
				@foreach($kat as $k)
                <div class="col-lg-6">
                    <div class="single-about">
						<img src="{{ URL::to('/') }}/gambar/{{ $k->gambar }}" class="img-fluid" width="80px" />
                        <h4>{{$k->nama_kat}}</h4>
                        <p>{{$k->keterangan_kat}}</p>
                    </div>
				</div>
				@endforeach
			</div>
			@endforeach
		</div>
	</section>
	<!-- End city Area -->
	<section class="blog-area section-gap">
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
							@foreach($kategori as $k)
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