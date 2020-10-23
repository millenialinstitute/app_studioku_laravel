@extends('layouts.auth')
@section('title' , 'Login')
@section('body')
	<h1>Login</h1>
	<form method="POST" action="{{ route('login') }}">
	@csrf

		<div class="form-group">
			<img src="{{ asset('/assets/auth/images/email_icon.svg') }}" alt="email" class="icon">
			<input type="email" id="email" placeholder="Email " autofocus="true" name="email" class="form-control" @error('email') is-invalid @enderror required>
		</div>
		@error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

		<div class="form-group">
			<img src="{{ asset('/assets/auth/images/password_icon.svg') }}" alt="password" class="icon">
			<input type="password" id="password" placeholder="Password" name="password" class="form-control" @error('email') is-invalid @enderror required >

		</div>
		@error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

		<div class="row jc-c">
			<button type="submit" class="btn">Login</button>
		</div>
		<div class="text-center">
			<p class="p" >Belum punya akun? <a href="/register" class="link">Daftar</a></p>
		</div>

	</form>
@endsection