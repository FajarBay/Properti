<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="asset/css/ready.css">
    <link rel="stylesheet" href="asset/css/demo.css">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

        html {
            height: 100%;
            box-sizing: border-box;
            }

            *,
            *:before,   
            *:after {
            box-sizing: inherit;
            }
        body {
            position: relative;
            min-height: 100%;
        }
        footer {
            position: absolute; 
            bottom: 0; 
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="app">
        

        <main>
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
	$('#harga').on('keyup', function(){
		var input = $(this).val();
		var rupiah = '';
		var angkarev = input.toString().split('').reverse().join('');
		for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
		$('#hasil').text("Rp. "+rupiah.split('',rupiah.length-1).reverse().join(''));
	 });

</script>
</html>
