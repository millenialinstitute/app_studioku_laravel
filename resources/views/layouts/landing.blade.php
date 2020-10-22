<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="logo_studioku_blue.svg">
	<link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/landing.css') }}">
</head>
<body>
	
	@yield('body')

</body>
</html>