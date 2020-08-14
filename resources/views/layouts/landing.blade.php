<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Proper</title>

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
	<style>
		.sub{
			background: none;
			color: inherit;
			border: none;
			padding: 0;
			font: inherit;
			cursor: pointer;
			outline: inherit;
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
		$('#sub').click(function(e){
			//preventing the default link redirection
			e.preventDefault();
		
			$('#myValue').val($(this).data('value'));
			$(this).closest('form').submit();
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
    <script>
        function goBack() {
        window.history.back();
        }
    </script>
</html>
