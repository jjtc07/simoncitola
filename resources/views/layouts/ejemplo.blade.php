<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>{{ getenv('APP_NOMBRE') }}</title>

	<!-- Bootstrap CSS 3.3.7-->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
	@if(getenv('APP_ENV')=='produccion')    
		<link rel="stylesheet" href={{ URL::asset('css/bootstrap.min.css') }}>
	@else
		<link rel="stylesheet" href={{ URL::asset('css/bootstrap.css') }}>
	@endif

</head>
<body>
	<div class="container">

		@yield("contenido")
	
	</div>

		<!-- jQuery -->
	<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
	<!-- Bootstrap JS 3.3.7-->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
	@if(getenv('APP_ENV')=='produccion')

	    <script src={{ URL::asset('js/jquery.min.js') }}></script>
	    <script src={{ URL::asset('js/bootstrap.min.js') }}></script>
	@else
	    <script src={{ URL::asset('js/jquery.js') }}></script>
	    <script src={{ URL::asset('js/bootstrap.js') }}></script>
	@endif
</body>
</html>