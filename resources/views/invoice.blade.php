@extends('layouts.edit')

@section('content')
    <div class="wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    @foreach ($transaksi as $p)
                    <div class="col-md-8 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title"><img src="{{ asset('asset/img/logo-nav.png') }}"></div><br>
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td width="200px" class="font-weight-bold">
                                                        <h6>Nomor Invoice :</h6>
                                                    </td>
                                                    <td class="font-weight-bold text-danger">{{$p->invoice}}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <small id="fasilitasHelp" class="form-text text-muted">Diterbitlkan atas nama:</small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Penjual</td>
                                                    <td>{{$p->penjual->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Nomor Telepon</td>
                                                    <td>{{$p->penjual->phone}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td width="200px" class="font-weight-bold">
                                                        <h6>Pembeli :</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">{{$p->pembeli->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Nomor Telepon</td>
                                                    <td>{{$p->pembeli->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Tanggal</td>
                                                    <td>
                                                        <?php
                                                            $date = new DateTime($p->created_at);
                                                            echo $date->format('d F Y');
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-hover ">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold" width="250px">Judul Iklan</td>
                                            <td>{{$p->proper->nama_prop}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" width="250px">Alamat</td>
                                            <td>{{$p->proper->provinsi}}, {{$p->proper->kabupaten}}, {{$p->proper->kecamatan}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" width="250px">Harga</td>
                                            <td>
                                                <?php 		
                                                    echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->proper->harga)),3)));
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="250px">Status Pembayaran</td>
                                            <td>
                                                <?php
                                                    $hasil = $p->proper->harga - $nominal;
                                                    if($hasil != 0 && $hasil >= 0){
                                                        echo "<span class=\"badge badge-warning\">Belum Lunas</span>";
                                                    }else{
                                                        echo "<span class=\"badge badge-success\">Lunas</span>";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <table class="table table-striped table-hover ">
                                    <tbody>
                                        @foreach($bukti as $b)
                                        <tr>
                                            <td width="250px"></td>
                                            <td width="450px">{{$b->catatan}}</td>
                                            <td>
                                                <?php 		
                                                    echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($b->nominal)),3)));
                                                ?>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td width="250px"></td>
                                            <td class="font-weight-bold" width="450px">Total Bayar</td>
                                            <td>
                                                <?php 		
                                                    echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($nominal)),3)));
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <a class="nav-link text-center">
                                    Proper <i class="la la-cubes"></i> Sistem Informasi Penjualan Properti
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection