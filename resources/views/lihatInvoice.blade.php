<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <style>
        body {
            font-family: 'nunito', sans-serif;
            color: #575962;
            font-size: 10px;
        }
        
        .container {
            margin: 0 auto;
            margin-top: 35px;
            padding: 40px;
            width: 600px;
            height: 400px;
            background-color: #fff;
        }
        * {
            box-sizing: border-box;
          }
          
          /* Create two equal columns that floats next to each other */
          .column {
            float: left;
            width: 50%; /* Should be removed. Only for demonstration */
          }
          
          /* Clear floats after the columns */
          .row:after {
            content: "";
            display: table;
            clear: both;
          }
        
        .justify-content-center {
            justify-content: center!important
        }
        
        .h6 {
            font-size: 12px;
        }
        
        .font-weight-bold {
            font-weight: 400!important
        }
        
        .card {
            border-radius: 0px;
            background-color: #ffffff;
            margin-bottom: 30px;
            border: 1px solid #eee;
        }
        
        .card .card-header {
            padding: 15px 15px;
            background-color: transparent;
            border-bottom: 1px solid #ebedf2 !important;
        }
        
        .card .card-title {
            margin: 0;
            color: #575962;
            font-size: 10px;
            font-weight: 600;
            line-height: 1;
        }
        
        .col {
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%
        }
        
        table {
            border-collapse: collapse
        }
        
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent
        }
        
        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6
        }
        
        .table tbody+tbody {
            border-top: 2px solid #dee2e6
        }
        
        .table .table {
            background-color: #fff
        }
        
        .table-sm td,
        .table-sm th {
            padding: .3rem
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .05)
        }
        
        .text-center {
            text-align: center!important
        }
        
        .tbl-pad {
            margin: 0 15px 0;
        }
        
        .img {
            width: 10px;
            vertical-align: baseline;
        }
        
        .text-danger {
            color: #ff646d !important;
        }
    </style>
</head>

<body>
<div class="container">
@foreach ($transaksi as $p)
<div class="card">
    <div class="card-header">
        <div class="card-title"><img src="{{ asset('asset/img/logo-nav.png') }}"></div><br>
        <div class="row">
            <div class="column">
                <table>
                    <tbody>
                        <tr>
                            <td class="font-weight-bold" width="100px">
                                <h3>Nomor Invoice :</h3>
                            </td>
                            <td class=" font-weight-bold text-danger">{{$p->invoice}}</td>
                        </tr>
                        <tr>
                            <td>
                                <small>Diterbitlkan atas nama:</small>
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
            <div class="column">
                <table>
                    <tbody>
                        <tr>
                            <td width="100px">
                                <h3>Pembeli :</h3>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">{{$p->pembeli->name}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>{{$p->pembeli->phone}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>
                                <?php
                                setlocale(LC_ALL, 'IND');
                                $date = new DateTime($p->created_at);
                                echo strftime("%d %B %Y", $date->getTimestamp());
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td class="font-weight-bold" width="150px">Judul Iklan</td>
                    <td>{{$p->proper->nama_prop}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Alamat</td>
                    <td>{{$p->proper->provinsi}}, {{$p->proper->kabupaten}}, {{$p->proper->kecamatan}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Harga</td>
                    <td>
                        <?php 		
                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($p->proper->harga)),3)));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Status Pembayaran</td>
                    <td>
                        <?php
                            $hasil = $p->proper->harga - $nominal;
                            if($hasil != 0 && $hasil >= 0){
                                echo "Belum Lunas";
                            }else{
                                echo "Lunas";
                            }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table class="table table-striped">
            <tbody>
                @foreach($bukti as $b)
                <tr>
                    <td class="font-weight-bold" width="150px">Catatan</td>
                    <td width="150px">{{$b->catatan}}</td>
                    <td>
                        <?php 		
                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($b->nominal)),3)));
                        ?>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td class="font-weight-bold">Total Bayar</td>
                    <td>
                        <?php 		
                            echo 'Rp. '.strrev(implode('.',str_split(strrev(strval($nominal)),3)));
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
            <p class="text-center">
                Proper <img class="img" src="{{ asset('asset/img/icon.png') }}"/> Sistem Informasi Penjualan Properti
            </p>
    </div>
</div>
@endforeach
</div>           
</body>

</html>