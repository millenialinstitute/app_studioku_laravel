<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="{{ asset('/assets/logo_studioku_blue.svg') }}">

	<link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/help.css') }}">
</head>
<body>
	<header>
		<img src="{{ asset('assets/help/help_illustration.svg') }}" alt="help">
		<div class="content">
			<h1>Butuh Bantuan ?</h1>
			<input type="text">
		</div>
	</header>
	@yield('body')
</body>
</html>