<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') </title>
	<link rel="shortcut icon" href="{{ asset('/assets/logo_studioku_blue.svg') }}">
	<link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
</head>
<body>
	
	<div class="row">
		<div class="col ai-c jc-c">
			<img src="{{ asset('/assets/auth/images/login_illustration.svg') }}" alt="illustrasi">
		</div>
		<div class="col card-login">
			<div style="width: 100%">
				@yield('body')
			</div>
		</div>
	</div>

</body>
</html>