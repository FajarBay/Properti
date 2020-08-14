@extends('layouts.edit')

@section('content')
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="/utama" class="logo"><img src="{{asset ('asset/img/logo-nav.png') }}"></a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav md-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="/daftarUser" role="button">
                                Daftar User
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
                        <img src="{{asset ('asset/img/support.png') }}">
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
                        <a href="/adminDash">
                            <i class="la la-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/daftarIklan">
                            <i class="la la-tags"></i>
                            <p>Daftar Iklan</p>
                        </a>
                    </li>
                    <li class="nav-item  active">
                        <a href="/daftarUser">
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
                        <a href="/daftarKategori">
                            <i class="la la-newspaper-o"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/daftarPembayaran">
                            <i class="la la-money"></i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/daftarPengembalian">
                            <i class="la la-dollar"></i>
                            <p>Daftar Pengembalian</p>
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
                                    @foreach($user as $u)
                                    <div class="card-title">Informasi User
                                        
                                        {{--  if($u->active == 1){
                                            echo "<span class=\"badge badge-success float-right\">Aktif</span>";
                                        }else {
                                            echo "<span class=\"badge badge-warning float-right\">Tidak Aktif</span>";
                                        }  --}}
                                            
                                    </div>
                                    @endforeach
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    @foreach($user as $u)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="text-center mb-3">
                                                <img src="{{ URL::to('/') }}/profil/{{ $u->profil }}" class="rounded" width="150px" height="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group has-success">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td width="150px">Nama</td>
                                                        <td width="20px">:</td>
                                                        <td>{{$u->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150px">Nomor Telepon</td>
                                                        <td width="20px">:</td>
                                                        <td>{{$u->phone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150px">Alamat :</td>
                                                        <td width="20px">:</td>
                                                        <td>{{$u->provinsi}}, {{$u->kabupaten}}, {{$u->kecamatan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150px">Nama Bank</td>
                                                        <td width="20px">:</td>
                                                        <td>{{$u->bank}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150px">Nomor Rekening</td>
                                                        <td width="20px">:</td>
                                                        <td>{{$u->no_rek}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="150px">Foto KTP</td>
                                                        <td width="20px">:</td>
                                                        <td><img alt="Product Image" width="350" height="200" src="{{ URL::to('/') }}/ktp/{{ $u->ktp }}"/></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="form-group">
                                                
                                                    {{--  if($u->active == 1){
                                                        echo '<button class="btn btn-warning">Batal Verifikasi</button>';
                                                    }else{
                                                        echo '<button class="btn btn-success">Verifikasi</button>';
                                                    }   --}}

                                                <?php
                                                if((DB::table('messages')->where('from', $u->id)->where('to', Auth::user()->id)->count() != 0) || 
                                                (DB::table('messages')->where('to', $u->id)->where('from', Auth::user()->id)->count() != 0)){
                                                    echo'<a href="/adminChat"><button class="btn btn-danger">Hubungi User</button></a>';
                                                }else{
                                                    echo '<button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLabel">Hubungi User</button>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  Modal  --}}
                                <div class="modal fade" id="exampleModalLabel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                    <form method="POST" action="{{route('pesanAdmin')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Kirim pesan pertama untuk {{$u->name}}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                              <div class="form-group">
                                                <label for="message-text" class="col-form-label">Pesan:</label>
                                                <textarea type="text" name="message" placeholder="Masukan pesan anda" class="form-control" rows="3"></textarea>
                                              </div>
                                        </div>
                                            <input type="hidden" name="from" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="to" value="{{$u->id}}">
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-danger">Kirim</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                      </div>
                                    </div>
                                </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
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
    @endsection