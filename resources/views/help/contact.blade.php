@extends('layouts.help')
@section('title'  , 'Hubungi Kami')
@section('body')

<div class="container">
	<h3 class="title-section">Kontak Kami</h3>
	<p>Apabila Anda tidak menemukan solusi yang Anda cari , Anda bisa hubungi kami melalui email.</p>

	<div class="card-contact">
		<input type="text" placeholder="Nama Lengkap">
		<input type="text" placeholder="Alamat Email">
		<textarea name="message" id="message" placeholder="Tulis pesan untuk kami"></textarea>
		<button>Kirim</button>
	</div>
</div>

@endsection
		