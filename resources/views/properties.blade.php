<!DOCTYPE html>
<html lang="zxx" class="no-js">

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
	<title>Properties</title>

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
						<a href="/utama"><img src="{{ asset('assets/img/logo-nav.png') }}" alt="" title="" /></a>
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
					<form class="search-form" action="{{ route('filter') }}" method="GET">
					<h1>IKLAN <b>PROPERTI</b></h1>
						{{--  <form class="form-inline" action="{{ route('cariProp') }}" method="GET">  --}}
							<div class="input-group mb-20 mr-auto ml-auto md-form form-sm form-2 col-lg-8">
								<input type="input" class="form-control app-select" name="cari_properti" placeholder="Cari berdasarkan lokasi atau nama">
								{{--  <div class="input-group-append">
									<span class="input-group-text">
										<i class="lnr lnr-magnifier"></i>
									</span>
								</div>  --}}
								{{--  <button class="primary-btn ml-10" type="submit">Cari<span class="lnr lnr-arrow-right"></span></button>  --}}
							</div>
						{{--  </form>  --}}
					<div class="search-field">
						
							<div class="row">
								<div class="col-lg-12 d-flex align-items-center justify-content-center toggle-wrap">
									<div class="row">
										<div class="col">
											<h4 class="search-title">Cari Properti Berdasarkan</h4>
										</div>
									</div>
								</div>
								{{--  <div class="col-lg-3 col-md-6 col-xs-6">
									<select class="app-select form-control" id="propinsi">
										<option selected="" value="">-- Pilih Provinsi --</option>
									</select>
								</div>  --}}
								<div class="col-lg-4 col-md-6 col-xs-6">
									<select name="kategori" class="app-select form-control">
										<option data-display="Kategori" value=""></option>
										@foreach ($kat as $k)
                                            <option name="kategori" value="{{$k->id}}">{{$k->nama_kat}}</option>
                                        @endforeach
									</select>
								</div>
								<div class="col-lg-4 col-md-6 col-xs-6">
									<select name="jenis" class="app-select form-control">
										<option data-display="Jenis Properti" value=""></option>
										<option name="jenis" value="0">Jual</option>
										<option name="jenis" value="1">Sewa Harian</option>
										<option name="jenis" value="2">Sewa Mingguan</option>
										<option name="jenis" value="3">Sewa Bulanan</option>
										<option name="jenis" value="4">Sewa Tahunan</option>
									</select>
								</div>
								{{--  <div class="col-lg-4 col-md-6 col-xs-6">
									<select name="sort" id="short" class="app-select form-control">
										<option data-display="Urutkan" value=""></option>
										<option name="sort" value="1">Terbaru</option>
										<option name="sort" value="2">Harga Terendah</option>
										<option name="sort" value="3">Harga Tertinggi</option>
									</select>
								</div>  --}}
								<div class="col-lg-4 col-md-6 col-xs-6">
									<select name="nego" class="app-select form-control">
										<option data-display="Nego" value=""></option>
										<option name="nego" value="0">Ya</option>
										<option name="nego" value="1">Tidak</option>
									</select>
								</div>
								<div class="col-lg-4 range-wrap"><br><br>
									<input type="text" class="form-control app-select" id="input" name="min_price" placeholder="Harga Minimal">
									<p class="small" >Harga Mainimal : <b><span id="rupiah"></span></b></p>
								</div>
								<div class="col-lg-4 range-wrap"><br><br>
									<input type="text" class="form-control app-select" id="input2" name="max_price" placeholder="Harga Maksimal" value="{{Request::get('max_price')}}">
									<p class="small">Harga Maksimal : <b><span id="rupiah2"></span></b></p>
								</div>
								<div class="ml-4 col-lg-3 d-flex justify-content-end">
									<button type="submit" class="primary-btn mr-2">Filter<span class="lnr lnr-arrow-right"></span></button>
									<a type="button" href="/properties" style="background-color: grey" class="primary-btn">Reset<span class="lnr lnr-undo"></span></a>
								</div>
							</div>
						
						</div>
					</form>
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
	<!-- End banner Area -->

	<!-- start banner Area -->
	<!-- End banner Area -->

	<!-- Start property Area -->
	<section class="property-area section-gap relative" id="property">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-12 header-text">
					<h1>Rekomendasi <b>Properti</b></h1>
					<p>
						Rekomendasi properti untuk anda hari ini
					</p><br>
					<div class="col-lg-3 col-md-6 col-xs-6 float-right">
						<select name="sort" id="short" class="app-select form-control" onchange="location = this.options[this.selectedIndex].value;">
							<option data-display="Urutkan" value=""></option>
							<option name="sort" value="{{route('properties')}}">Terbaru</option>
							<option name="sort" value="{{route('terendah')}}">Harga Terendah</option>
							<option name="sort" value="{{route('tertinggi')}}">Harga Tertinggi</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				@forelse($data as $d)
				<div class="col-lg-4" style="margin-bottom: 20px">
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
								<h4><a href="{{route('lihat', $d->id)}}">{{$d->nama_prop}}</a></h4>
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
									<p>Alamat : {{$d->kecamatan}}, {{$d->kabupaten}}, {{$d->provinsi}}</p>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p>{{$d->kategori->nama_kat}}</p>
							</div>
						</div>
					</div>
				</div>
				@empty
					<div class="container">
						<div class="row d-flex justify-content-center">
							<p style="font-size: 20px" class="alert alert-danger">
								"Iklan yang anda cari tidak ditemukan"
							</p>
						</div>
					</div>
				@endforelse
				<br>
			</div>
		</div>
	</section>
	<!-- End property Area -->
	{{ $data->links("pagination::bootstrap-4") }}
	<br>
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
						<a href="/propJKT" target="_blank">
							<div class="content-overlay"></div>
							<img class="content-image img-fluid d-block mx-auto" src="{{ asset('assets/img/jakarta.jpg') }}" alt="">
							<div class="content-details fadeIn-bottom">
								<h3 class="content-title">Jakarta</h3>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 mb-10">
					<div class="content">
						<a href="/propBDG" target="_blank">
							<div class="content-overlay"></div>
							<img class="content-image img-fluid d-block mx-auto" src="{{ asset('assets/img/bandung.jpg') }}" alt="">
							<div class="content-details fadeIn-bottom">
								<h3 class="content-title">Bandung</h3>
							</div>
						</a>
					</div>
					<div class="row city-bottom">
						<div class="col-lg-6 col-md-6 mt-30">
							<div class="content">
								<a href="/propDIY" target="_blank">
									<div class="content-overlay"></div>
									<img class="content-image img-fluid d-block mx-auto" src="{{ asset('assets/img/jogja.jpeg') }}" alt="">
									<div class="content-details fadeIn-bottom">
										<h3 class="content-title">Yogyakarta</h3>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 mt-30">
							<div class="content">
								<a href="/propSMG" target="_blank">
									<div class="content-overlay"></div>
									<img class="content-image img-fluid d-block mx-auto" src="{{ asset('assets/img/semarang.jpg') }}" alt="">
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
</body>

	<script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/js/ion.rangeSlider.js') }}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
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
<script>
	$('#input').on('keyup', function(){
		var input = $(this).val();
		var rupiah = '';
		var angkarev = input.toString().split('').reverse().join('');
		for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
		$('#rupiah').text("Rp. "+rupiah.split('',rupiah.length-1).reverse().join(''));
	 });

</script>
<script>
	$('#input2').on('keyup', function(){
		var input = $(this).val();
		var rupiah = '';
		var angkarev = input.toString().split('').reverse().join('');
		for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
		$('#rupiah2').text("Rp. "+rupiah.split('',rupiah.length-1).reverse().join(''));
	 });

</script>
{{--  <script type="text/javascript">

	$('#input').on('keyup', function(){
		var input = $(this).val();
		$('#rupiah').text(input);
	 });
		
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
	});

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>  --}}

</html>