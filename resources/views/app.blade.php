<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Equipment System</title>
	<!--favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/icons.css')}}" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/app.css')}}" />
</head>

<body>
    <div id="app">                
        @yield('content')       
    </div>
</body>

</html>