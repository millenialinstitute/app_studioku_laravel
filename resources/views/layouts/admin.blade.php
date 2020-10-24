<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>

	<link rel="shortcut icon" href="{{ asset('/assets/logo_studioku_blue.svg') }}">
	<link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
</head>
<body>

	<header>
		<img src="{{ asset('/assets/dashboard/sidebar-icon/notification_icon.svg') }}" alt="notification">
		<img src="{{ asset('/assets/dashboard/sidebar-icon/profile_icon.svg') }}" alt="profile">
	</header>

	<aside>
		<img src="{{ asset('/assets/dashboard/icons/logo_studioku.svg') }}" alt="studioku" class="logo">
		<a href="{{ url('/admin/dashboard') }}" class="menu-item @yield('dashboard') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/home_icon.svg') }}" alt="dashboard">
			<span>Dashboard</span>
		</a>
		<a href="#contributor" data-target="#contributor" class="menu-item btn-collapse @yield('contributor') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/contributor_icon.svg') }}" alt="contributor">
			<span>Kontributor</span>
			<div class="menu-collapse" data-height="84px" id="contributor">
				<a href="{{ url('/admin/contributor/all') }}">Semua Kontributor</a>
				<a href="{{ url('/admin/contributor/waiting') }}">Menunggu</a>
			</div>
		</a>
		<a href="" class="menu-item @yield('member') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/member_icon.svg') }}" alt="member">
			<span>member</span>
		</a>
		<a href="" class="menu-item @yield('item') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
			<span>item</span>
		</a>
		<a href="" class="menu-item @yield('earning') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/earning_icon.svg') }}" alt="earning">
			<span>keuangan</span>
		</a>
		<a href="" class="menu-item @yield('sales') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/sell_icon.svg') }}" alt="sales">
			<span>penjualan</span>
		</a>
		<a href="{{ url('admin/payment') }}" class="menu-item @yield('payment') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="payment">
			<span>pembayaran</span>
		</a>
		<a href="{{ url('/admin/statistic') }}" class="menu-item @yield('statistic') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/statistic_icon.svg') }}" alt="statistik">
			<span>statistik</span>
		</a>
		<a href="{{ url('/admin/guide') }}" class="menu-item @yield('guide') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/info_icon.svg') }}" alt="guide">
			<span>panduan</span>
		</a>
		<a href="" class="menu-item @yield('logout') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/logout_icon.svg') }}" alt="logout">
			<span>logout</span>
		</a>
	</aside>
	
	<div class="body">
		@yield('body')
	</div>


	<script src="{{ asset('/js/dashboard.js') }}"></script>

</body>
</html>