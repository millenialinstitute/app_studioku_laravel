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
		<a href="{{ url('/member/dashboard') }}" class="menu-item @yield('dashboard') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/home_icon.svg') }}" alt="dashboard">
			<span>Dashboard</span>
		</a>
		<a href="{{ url('/member/download') }}" class="menu-item @yield('download') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/download_icon.svg') }}" alt="member">
			<span>Unduhan</span>
		</a>
		<a href="{{ url('/member/favorite') }}" class="menu-item @yield('favorite') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/favorite_icon.svg') }}" alt="favorite">
			<span>Favorite</span>
		</a>
		<a href="{{ url('member/collection') }}" class="menu-item @yield('collection') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/collection_icon.svg') }}" alt="collection">
			<span>Koleksi</span>
		</a>
		<a href="{{ url('member/cart') }}" class="menu-item @yield('cart') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
			<span>Keranjang</span>
		</a>
		<a href="{{ url('/member/info') }}" class="menu-item @yield('info') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/info_icon.svg') }}" alt="statistik">
			<span>panduan</span>
		</a>
		<a href="{{ url('/member/profile') }}" class="menu-item @yield('profile') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/info_icon.svg') }}" alt="profile">
			<span>profile</span>
		</a>
		<a href="{{ url('/') }}" class="menu-item @yield('homepage') ">
			<img src="{{ asset('/assets/dashboard/sidebar-icon/home_icon.svg') }}" alt="dashboard">
			<span>homepage</span>
		</a>
		<a href="{{ route('logout') }}" class="menu-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" >
            <img src="{{ asset('/assets/dashboard/sidebar-icon/logout_icon.svg') }}" alt="logout">
			<span>logout</span>
         </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
	</aside>
	
	<div class="body">
		@yield('body')
	</div>


	<script src="{{ asset('/js/dashboard.js') }}"></script>

</body>
</html>