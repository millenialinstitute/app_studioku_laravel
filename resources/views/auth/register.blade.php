@extends('layouts.auth')

@section('title' , 'Register')
@section('body')

	<h1>Daftar</h1>
	<form method="POST" action="{{ route('register') }}">
		@csrf
		<div class="form-group">
			<img src="{{ asset('/assets/auth/images/username_icon.svg') }}" alt="username" class="icon" >
			<input type="text" name="name" placeholder="Nama Lengkap" class="form-control" @error('username') is-invalid @enderror required>

			@error('username')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
		</div>

		<div class="form-group">
			<img src="{{ asset('/assets/auth/images/email_icon.svg') }}" alt="email" class="icon" >
			<input type="email" name="email" placeholder="Email" class="form-control" @error('email') is-invalid @enderror required>
			
			@error('email')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
		</div>

		<div class="form-group">
			<img src="{{ asset('/assets/auth/images/password_icon.svg') }}" alt="password" class="icon" >
			<input type="password" name="password" placeholder="Password" class="form-control" @error('password') is-invalid @enderror required>
			
			@error('password')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
		</div>

		<div class="form-group">
			<img src="{{ asset('/assets/auth/images/password_icon.svg') }}" alt="password" class="icon" >
			<input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="form-control" @error('password') is-invalid @enderror required>
			
			@error('password_confirmation')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
		</div>

		<div class="row jc-c">
			<button type="submit" class="btn">Daftar</button>
		</div>
		<div class="text-center">
			<p class="p" >Sudah punya akun? <a href="{{ url('/login') }}" class="link">Login</a></p>
		</div>

	</form>

@endsection