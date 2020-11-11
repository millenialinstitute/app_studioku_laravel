<header class="navbarLanding">
	<div class="row">
		<div class="col">
			<a href="{{ url('/') }}" class="brand">
				<img src="/assets/landing/icons/logo_studioku.svg" alt="logo studioku">
			</a>
		</div>
		<div class="col text-right">
			<a href="">UMKM</a>
			@if($auth)
				<a href="{{ url('/home') }}">Dashboard</a>
			@else
				<a href="{{ url('/login') }}">Login</a>
				<a href="{{ url('register') }}">Daftar</a>
			@endif
		</div>
	</div>
</header>