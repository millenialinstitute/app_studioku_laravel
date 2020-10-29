<header class="navbarLanding">
	<div class="row">
		<div class="col">
			<div class="brand">
				<img src="/assets/landing/icons/logo_studioku.svg" alt="logo studioku">
			</div>
		</div>
		<div class="col text-right">

			@if($auth)
				<a href="{{ url('/home') }}">Dashboard</a>
			@else
				<a href="{{ url('/login') }}">Login</a>
				<a href="{{ url('register') }}">Daftar</a>
			@endif
		</div>
	</div>
</header>