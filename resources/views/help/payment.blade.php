@extends('layouts.help')
@section('title'  , 'Sistem Pembayaran')
@section('body')

<div class="container">
	<h3 class="title-section" style="font-weight: bold;">Sistem Pembayaran</h3>
	<p>Setiap karya yang diupload , harga karya ditentukan sendiri oleh kontributor. Setiap karya yang terjual Kontributor mendapat pembayaran sebesar harga karya dikurangi 30% sebagai komisi Studioku. Kontributor bisa melakukan penarikan saldo apabila mencapai jumlah saldo minimum Rp100.000,00</p>
	<div class="card-payment">
		<div class="item">
			<div class="preview">
				<img src="{{ asset('storage/photos/example.jpg') }}" alt="examp">
			</div>
			<div class="content">
				<h4 class="title">Flat Illustration About Coffe</h4>
				<p>Rp50.000</p>
			</div>
		</div>
		<div class="math">
			<div class="row jc-b mb-1">
				<span>Harga Item</span>
				<span>Rp50.000</span>
			</div>
			<div class="row jc-b mb-1">
				<span>Komisi 30%</span>
				<span>Rp15.000</span>
			</div>
			<div class="row jc-b mb-1">
				<span>Pembayaran DIterima</span>
				<span>Rp35.000</span>
			</div>
		</div>
	</div>
</div>

@endsection
	