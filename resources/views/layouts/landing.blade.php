<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="{{ asset('/assets/logo_studioku_blue.svg') }}">
	<link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/landing.css') }}">
</head>
<body>
	

	@include('components.navbar')
	@yield('body')

	<div class="footer row">
		<div class="col-2">
			<p>Temukan ratusan desain untuk kebutuhan bisnis Anda.</p>
		</div>
		<div class="col">
			<h5>Studioku</h5>
			<div class="footer-link">
				<a href="" class="link-item">Tentang Kami</a>
				<a href="" class="link-item">Kontributor</a>
				<a href="" class="link-item">Blog</a>
				<a href="" class="link-item">Pusat Bantuan</a>
			</div>
		</div>
		<div class="col">
			<h5>Item</h5>
			<div class="footer-link">
				<a href="" class="link-item">Kategori</a>
				<a href="" class="link-item">Item Gratis</a>
				<a href="" class="link-item">Top Item</a>
			</div>
		</div>
		<div class="col">
			<h5>Informasi</h5>
			<div class="footer-link">
				<a href="" class="link-item">Syarat dan Kebijakan </a>
				<a href="" class="link-item">Hak Cipta </a>
				<a href="" class="link-item">Lisensi </a>
				<a href="" class="link-item">Hubungi Kami</a>
			</div>
		</div>
	</div>		
	<hr class="hr-footer">
	<footer class="row jc-b">
		<img src="{{ asset('/assets/dashboard/icons/logo_studioku.svg') }}" alt="logo" height="30px">
		<p>&copy;2020 Studioku. All Rights Reserved.</p>
		<div class="socmed">
			
		</div>
	</footer>
	<script src="{{ asset('/js/landing.js') }}"></script>

</body>
</html>