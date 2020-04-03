<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Tables - Ready Bootstrap Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="asset/css/ready.css">
    <link rel="stylesheet" href="asset/css/demo.css">
    <style>
        .incoming_msg_img {
        display: inline-block;
        width: 6%;
        }
            .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
        }
        .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
        }
        .received_withd_msg { width: 57%;}
        .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
        }

        .sent_msg p {
        background: #ff646d none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
        }
        .outgoing_msg{ overflow:hidden; margin:26px 0 26px; padding-right:10px;}
        .sent_msg {
        float: right;
        width: 46%;
        }
    </style>
</head>
<body>
    <div id="app">
        

        <main">
            @yield('content')
        </main>
    </div>
</body>
<script src="asset/js/core/jquery.3.2.1.min.js"></script>
<script src="asset/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="asset/js/core/popper.min.js"></script>
<script src="asset/js/core/bootstrap.min.js"></script>
<script src="asset/js/plugin/chartist/chartist.min.js"></script>
<script src="asset/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
{{-- <script src="asset/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> --}}
<script src="asset/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="asset/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="asset/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="asset/js/plugin/chart-circle/circles.min.js"></script>
<script src="asset/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="asset/js/ready.min.js"></script>
<script src="asset/js/demo.js"></script>
<script>
    function copytextbox() {
        var angka = document.getElementById('harga').value;
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            // 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('')
        document.getElementById('hasil').value = "Rp. "+rupiah.split('',rupiah.length-1).reverse().join('');
    }

</script>
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
</html>
