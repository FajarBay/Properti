@extends('layouts.edit')

@section('content')
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="/utama" class="logo"><img src="{{ asset('asset/img/logo-nav.png') }}"></a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav md-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="button">
                                Data Iklan
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
                        <img src="{{ URL::to('/') }}/profil/{{ Auth::user()->profil }}">
                    </div>
                    <div class="info">
                        <a class="" href="cek">
                            <span>
                                {{Auth::user()->name}}
									<span class="user-level">Pengguna</span>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="/dashboard">
                            <i class="la la-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="/iklan">
                            <i class="la la-tags"></i>
                            <p>Daftar Iklan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pesanan">
                            <i class="la la-shopping-cart"></i>
                            <p>Pesanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#collapseExample1" data-toggle="collapse" aria-expanded="true">
                            <i class="la la-envelope-o"></i>
                            <p>Pesan</p>
                            <span class="caret float-right"></span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample1" aria-expanded="true" style="">
                            <ul class="nav">
                                <li>
                                    <a href="/chatAdmin">
                                        <span class="link-collapse">Pesan Admin</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/chatCustomer">
                                        <span class="link-collapse">Pesan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/pembelian">
                            <i class="la la-cart-plus"></i>
                            <p>Pembelian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/penjualan">
                            <i class="la la-money"></i>
                            <p>Penjualan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pengembalian">
                            <i class="la la-dollar"></i>
                            <p>Pengembalian</p>
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
                        <!-- <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Profile
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="asset/img/profile2.jpg" class="rounded">
                                    </div>
                                </div>
                                <div class="card-body">
                                    Nama Pengguna
                                </div>
                            </div>
                        </div> -->
                            <div class="col-md-12">
                                @foreach($properti as $properti)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Detail Iklan Anda
                                            <?php
                                                if($properti->iklan->status == 0){
                                                   echo "<span class=\"badge badge-warning float-right\">Menunggu</span>";
                                                }else {
                                                   echo "<span class=\"badge badge-success float-right\">Aktif</span>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('iklan.update', $properti->id)}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="card-body">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="200px">Kategori</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <select class="form-control" name="id_kat">
                                                                            @foreach ($kat as $k)
                                                                            <option value="{{$k->id}}"{{($k->id === $properti->id_kat) ? 'Selected' : ''}}>{{$k->nama_kat}}</option>
                                                                            @endforeach
                                                                            {{-- <option value="1">Rumah</option>
                                                                            <option value="2">Apartemen</option>
                                                                            <option value="3">Kos</option>
                                                                            <option value="4">Tanah</option>
                                                                            <option value="5">Ruko</option>
                                                                            <option value="6">Toko/Kios</option> --}}
                                                                            {{-- <input id="kec" type="hidden" name="id_kat" value="{{ $properti->id_kat }}"> --}}
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Nama</td>
                                                                    <td width="20px">:</td>
                                                                    <td><input type="text" name="nama_prop" value="{{$properti->nama_prop}}" placeholder="Input" class="form-control" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Harga</td>
                                                                    <td width="20px">:</td>
                                                                    <td><input type="text" name="harga" id="harga" onkeyup="copytextbox();" value="{{$properti->harga}}" placeholder="Input" class="form-control" autocomplete="off"/>
                                                                    <small id="hargaHelp" class="form-text text-muted">Nominal : <b><span id="hasil"></span></b></small></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Alamat</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <select class="form-control" id="propinsi">
                                                                                    <option selected="" value="">-- Pilih Provinsi --</option>
                                                                                </select>
                                                                                {{-- <input id="prop" type="hidden" name="provinsi" value="{{ $properti->provinsi }}"> --}}
                                                                            </div>
        
                                                                            <div class="col-md-4">
                                                                                <select class="form-control" id="kabupaten">
                                                                                    <option selected="" value="">-- Pilih Kabupaten --</option>
                                                                                </select>
                                                                                {{-- <input id="kab" type="hidden" name="kabupaten" value="{{ $properti->kabupaten }}">   --}}
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <select class="form-control" id="kecamatan">
                                                                                    <option selected="" value="">-- Pilih Kecamatan --</option>
                                                                                </select>
                                                                                {{-- <input id="kec" type="hidden" name="kecamatan" value="{{ $properti->kecamatan }}"> --}}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <input id="prop" type="hidden" name="provinsi" value="{{$properti->provinsi}}">
                                                                <input id="kab" type="hidden" name="kabupaten" value="{{$properti->kabupaten}}">
                                                                <input id="kec" type="hidden" name="kecamatan" value="{{$properti->kecamatan}}">
                                                                <tr>
                                                                    <td width="200px">Alamat</td>
                                                                    <td width="20px">:</td>
                                                                    <td><input type="text" name="alamat" value="{{$properti->alamat}}" placeholder="Input" class="form-control" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Alamat Maps</td>
                                                                    <td width="20px">:</td>
                                                                    <td><input type="text" name="alamatmaps" value="{{$properti->alamatmaps}}" placeholder="Input" class="form-control" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Deskripsi</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <textarea class="form-control" name="deskripsi" rows="3" placeholder="Fasilitas yang tersedia">{{$properti->deskripsi}}</textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Fasilitas</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <textarea class="form-control" name="fasilitas" rows="3" placeholder="Fasilitas yang tersedia">{{$properti->fasilitas}}</textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Jenis Iklan</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <select class="form-control" name="jenis">
                                                                            <option data-display="Jenis Iklan">-- Jenis Iklan --</option>
                                                                            <option name="jenis" value="0"{{($iklan->jenis == '0') ? 'Selected' : ''}}>Jual</option>
                                                                            <option name="jenis" value="1"{{($iklan->jenis == '1') ? 'Selected' : ''}}>Sewa Harian</option>
                                                                            <option name="jenis" value="2"{{($iklan->jenis == '2') ? 'Selected' : ''}}>Sewa Mingguan</option>
                                                                            <option name="jenis" value="3"{{($iklan->jenis == '3') ? 'Selected' : ''}}>Sewa Bulanan</option>
                                                                            <option name="jenis" value="4"{{($iklan->jenis == '4') ? 'Selected' : ''}}>Sewa Tahunan</option>
                                                                        </select>
                                                                        {{-- <input id="kec" type="hidden" name="jenis" value="{{ $properti->iklan->jenis }}"> --}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Nego</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <select class="form-control" name="nego">
                                                                            <option data-display="Nego">-- Nego? --</option>
                                                                            <option name="nego" value="0"{{($iklan->nego == '0') ? 'Selected' : ''}}>Iya</option>
                                                                            <option name="nego" value="1"{{($iklan->nego == '1') ? 'Selected' : ''}}>Tidak</option>
                                                                        </select>
                                                                        {{-- <input id="kec" type="hidden" name="nego" value="{{ $properti->iklan->nego }}"> --}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Status</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <select class="form-control" name="sold">
                                                                            <option data-display="Status Terjual">-- Status Terjual --</option>
                                                                            <option name="sold" value="0"{{($iklan->sold == '0') ? 'Selected' : ''}}>Terjual</option>
                                                                            <option name="sold" value="1"{{($iklan->sold == '1') ? 'Selected' : ''}}>Belum Terjual</option>
                                                                            <option name="sold" value="2"{{($iklan->sold == '2') ? 'Selected' : ''}}>Dipesan</option>
                                                                        </select>
                                                                        {{-- <input id="kec" type="hidden" name="sold" value="{{ $properti->iklan->sold }}"> --}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="200px">Foto 1</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <img src="{{ URL::to('/') }}/foto1/{{ $properti->foto1 }}" class="img-thumbnail mb-2 w-50" />
                                                                        <input class="form-control" type="file" name="foto1">
                                                                        <input type="hidden" name="foto_1" value="{{$properti->foto1}}" /></br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px">Foto 2</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <img src="{{ URL::to('/') }}/foto2/{{ $properti->foto2 }}" class="img-thumbnail mb-2 w-50" />
                                                                        <input class="form-control" type="file" name="foto2">
                                                                        <input type="hidden" name="foto_2" value="{{$properti->foto2}}" /></br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px">Foto 3</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <img src="{{ URL::to('/') }}/foto3/{{ $properti->foto3 }}" class="img-thumbnail mb-2 w-50" />
                                                                        <input class="form-control" type="file" name="foto3">
                                                                        <input type="hidden" name="foto_3" value="{{$properti->foto3}}" /></br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px">Foto 4</td>
                                                                    <td width="20px">:</td>
                                                                    <td>
                                                                        <img src="{{ URL::to('/') }}/foto4/{{ $properti->foto4 }}" class="img-thumbnail mb-2 w-50" />
                                                                        <input class="form-control" type="file" name="foto4">
                                                                        <input type="hidden" name="foto_4" value="{{$properti->foto4}}" /></br>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <div class="text-right ">
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        <a href="/iklan">
                                                            <button class="btn btn-danger">Batal</button>
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
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
    @endsection