@extends('layouts.landing')

@section('content')
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
                    <a href="/utama"><img src="{{asset ('assets/img/logo-nav.png') }}" alt="" title="" /></a>
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

<!-- End banner Area -->

<!-- Start About Area -->
@foreach($data as $d)
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
                <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto1/{{ $d->foto1 }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto2/{{ $d->foto2 }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto3/{{ $d->foto3 }}" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="{{ URL::to('/') }}/foto4/{{ $d->foto4 }}" alt="Forth slide">
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
                    <h3><b>{{$d->nama_prop}}</b></h3>
                    <p>{{$d->kecamatan}}, {{$d->kabupaten}}, {{$d->provinsi}}</p><br>
                    <div class="f-size">
                        <h5>
                            Fasilitas
                        </h5>
                        <p>{{$d->fasilitas}}</p><br>
                        <h5>
                            Deskripsi
                        </h5>
                        <p>{{ $d->deskripsi }}</p>
                        <br>
                        <h5>
                            Alamat Lengkap
                        </h5>
                        <p>{{ $d->alamat}}</p>
                        {{-- <p>Jalan Kaliurang, Catur Tunggal, Kecamatan Depok, Manggung, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p> --}}
                        <br>
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
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/') }}/profil/{{ $d->user->profil }}" width="60px" height="60px">
                    </div>
                    <P class="mt-2"><b>Pemilik</b></P>
                    <p>{{$d->user->name}}</p><br>
                    <p><b>{{$d->user->name}}</b> merupakan pengiklan yang Terdaftar sejak tanggal 
                    <?php
                        setlocale(LC_ALL, 'IND');
                        $date = new DateTime($d->user->created_at);
                        echo strftime("%d %B %Y", $date->getTimestamp());
                    ?>.</p>
                    {{--  <p>Untuk melihat kelengkapan data dari pengiklan, Silahkan Klik <b>Lihat pengiklan.</b></p>  --}}
                     
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 testimonial-carusel">
                <div class="single-testimonial text-left card-body">
                    <p>
                        Dipasang pada tanggal <?php
                        setlocale(LC_ALL, 'IND');
                        $date = new DateTime($d->created_at);
                        echo strftime("%d %B %Y", $date->getTimestamp());
                        ?>
                    </p>
                    <p><b>Data bisa berubah sewaktu-waktu</b></p>
                    <br>
                    <h6 style="color:black">
                        <?php 		
                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($d->harga)),3)));
                            if($iklan->jenis == 1){
                                echo ' / Hari';
                            }else if($iklan->jenis == 2){
                                echo ' / Minggu';
                            }else if($iklan->jenis == 3){
                                echo ' / Bulan';
                            }else if($iklan->jenis == 4){
                                echo ' / Tahun';
                            }
                        ?>
                        
                    </h6>
                    <p><i class="fa fa-check-square-o pr-2" style="margin-right: 2px" aria-hidden="true"></i> 
                        <?php
                            if($iklan->status == 0){
                                echo 'Belum Terverifiksi';
                            }else{
                                echo 'Terverivikasi';
                            }
                        ?>
                    </p>
                    <p><i class="fa fa-tags pr-2" aria-hidden="true"></i> Iklan 
                        <?php
                            if($iklan->jenis == 0){
                                echo 'Jual';
                            }else {
                                echo 'Sewa';
                            }
                        ?>
                    </p>
                    <p><i class="fa fa-handshake-o pr-2" style="margin-right: 1px" aria-hidden="true"></i>Nego : 
                        <?php
                            if($iklan->nego == 0){
                                echo 'Iya';
                            }else {
                                echo 'Tidak';
                            }
                        ?>
                    </p>
                    <p><i class="fa fa-eye" style="margin-right: 13px" aria-hidden="true"></i>Dilihat 
                        {{$iklan->dilihat}} kali
                    </p><br>
                    <div class="text-center">
                        
                    <?php
                        if(Auth::check()){
                            if(Auth::user()->profil == null || Auth::user()->ktp == null || Auth::user()->provinsi == null ||
                            Auth::user()->kabupaten == null || Auth::user()->kecamatan == null || Auth::user()->bank == null ||
                            Auth::user()->no_rek == null){
                                echo '<button class="btn btn-danger" data-toggle="modal" data-target="#lengkapi">Pesan</button>';
                            }else{
                                if($iklan->book == 1 && $iklan->sold == 2){
                                    echo '<button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" disabled>Sudah Dipesan</button>';
                                }else if($iklan->sold == 1){
                                    echo '<button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" disabled>Iklan Terjual</button>';
                                }else if($book == $d->id && $usr == Auth::user()->id){
                                    echo '<button class="btn btn-danger" data-toggle="modal" data-target="#SudahPesan">Pesan</button>';
                                }else {
                                    echo '<button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Pesan</button>';
                                }
                            }
                        }
                        else if($iklan->book == 1 && $iklan->sold ==2){
                            echo '<button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" disabled>Sudah Dipesan</button>';
                        }else if($iklan->sold == 1){
                            echo '<button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" disabled>Iklan Terjual</button>';
                        }else if($book == $d->id && $usr == Auth::user()->id){
                            echo '<button class="btn btn-danger" data-toggle="modal" data-target="#SudahPesan">Pesan</button>';
                        }else {
                            echo '<button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Pesan</button>';
                        }
                    ?>
                    <?php
                     if(Auth::check()){
                        if($iklan->book == 1 && $iklan->sold == 1){
                            echo '<button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" disabled>Kirim Pesan</button>';
                        }else {
                            if((DB::table('messages')->where('from', $d->user->id)->where('to', Auth::user()->id)->count() != 0) || 
                            (DB::table('messages')->where('to', $d->user->id)->where('from', Auth::user()->id)->count() != 0)){
                                echo '<button class="btn btn-secondary" data-toggle="modal" data-target="#pesan">Kirim Pesan</button>';
                            }else{
                                echo '<button class="btn btn-secondary" data-toggle="modal" data-target="#pesan">Kirim Pesan</button>';
                            }
                        }
                     }else if($iklan->book == 1 && $iklan->sold == 2){
                        echo '<button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" disabled>Kirim Pesan</button>';
                     }else{
                        echo '<button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Kirim Pesan</button>';
                     }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal 1 --}}
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
				<p>Untuk memesan iklan, anda harus memiliki akun terlebih dahulu.</p>
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
    {{-- Modal 2 --}}
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
                    Setelah memesan, harap menghubungi pemilik properti sebelum melakukan pembelian.<hr>
                    Setelah sepakat dengan pengiklan, <b>segera upload bukti pembayaran!</b>
                </div>
                <form action="{{route('book', $d->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <input type="hidden" name="book" value="1">
                @if (Auth::check())
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                @endif
                <input type="hidden" name="id_prop" value="{{ $d->id }}">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Pesan Sekarang</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal 3 --}}
    <div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('pesanPertama')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hubungi Pengiklan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Setelah mengirim salah satu pesan dibawah, anda akan terhubung dengan pengiklan secara langsung melalui chatroom dashboard.
                    <hr>
                    <div class="form-group">
                        <input type="radio" id="message1" name="message" value="Judul Iklan : {{$d->nama_prop}}. Saya butuh secepatya. Bisa pesan sekarang?">
                        <label for="message1">Saya butuh secepatnya. Bisa pesan sekarang?</label><br>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="message2" name="message" value="Judul Iklan : {{$d->nama_prop}}. Saya ingin bertanya-tanya dulu.">
                        <label for="message2">Saya ingin bertanya-tanya dulu.</label><br>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="message3" name="message" value="Judul Iklan : {{$d->nama_prop}}. Apakah bisa nego?">
                        <label for="message3">Apakah bisa nego?</label><br>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="message4" name="message" value="Judul Iklan : {{$d->nama_prop}}. Alamat lengkapnya ada dimana?">
                        <label for="message4">Alamat lengkapnya ada dimana?</label><br>
                    </div>
                    @if (Auth::check())
                    <input type="hidden" name="from" value="{{ Auth::user()->id }}">
                    @endif
                    <input type="hidden" name="to" value="{{$d->user->id}}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Kirim</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal 4 --}}
    <div class="modal fade" id="SudahPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pesan Properti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Anda sudah melakukan pemesanan pada iklan ini? properti ini di simpan di <b>daftar pesanan</b> anda.
                    <hr>
                    Setelah sepakat dengan pengiklan, <b>segera upload bukti pembayaran!</b>
                </div>
                <div class="modal-footer">
                    <a href="/pesanan"><button type="submit" class="btn btn-danger">Buka Pesanan</button></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    {{--  Modal 5  --}}
    <div class="modal fade" id="lengkapi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Data Diri Belum Lengkap</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>Untuk menambah iklan, anda harus melengkapi data diri terlebih dahulu.</p>
                <p>Silahkan lengkapi data diri anda pada menu <b>Profil</b></p>
            </div>
            <div class="modal-footer">
                <a href="/cek"><button type="button" class="btn btn-danger">Buka Profil</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
        </div>
    </div>
</section>
@endforeach

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
@endsection