@extends('layouts.help')
@section('title'  , 'Help Center')
@section('body')

<div class="list-help">
	<div class="row">
		<div class="col">
			<a href="{{ url('/help/account') }}" class="card-help">
				<img src="{{ asset('/assets/help/account_illustration.svg') }}" alt="account">
				<p>Tentang Akun</p>
			</a>
		</div>
		<div class="col">
			<a href="{{ url('/help/requirements') }}" class="card-help">
				<img src="{{ asset('/assets/help/guide_illustration.svg') }}" alt="guide">
				<p>Ketentuan Karya</p>
			</a>
		</div>
		<div class="col">
			<a href="{{ url('/help/upload') }}" class="card-help">
				<img src="{{ asset('/assets/help/upload_illustration.svg') }}" alt="account">
				<p>Proses Upload</p>
			</a>
		</div>
		<div class="col">
			<a href="{{ url('/help/reject') }}" class="card-help">
				<img src="{{ asset('/assets/help/rejection_illustration.svg') }}" alt="guide">
				<p>Alasan Karya Ditolak</p>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a href="{{ url('/help/payment') }}" class="card-help">
				<img src="{{ asset('/assets/help/payout_illustration.svg') }}" alt="account">
				<p>Sistem Pembayaran</p>
			</a>
		</div>
		<div class="col">
			<a href="" class="card-help">
				<img src="{{ asset('/assets/help/license_illustration.svg') }}" alt="guide">
				<p>Lisensi</p>
			</a>
		</div>
		<div class="col">
			<a href="" class="card-help">
				<img src="{{ asset('/assets/help/copyright_illustration.svg') }}" alt="account">
				<p>Hak Cipta</p>
			</a>
		</div>
		<div class="col">
			<a href="{{ url('/help/contact') }}" class="card-help">
				<img src="{{ asset('/assets/help/contact_illustration.svg') }}" alt="guide">
				<p>Hubungi Kami</p>
			</a>
		</div>
	</div>
</div>

@endsection
	