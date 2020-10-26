@extends('layouts.member')
@section('title'  , 'Keranjang')
@section('cart' , 'active')
@section('body')

<div class="row">
	<div class="col-2">
		<div class="card-cart">
			<p>Semua item yang Anda masukkan dalam keranjang ditampilkan disini!
				Yuk bayar sekarang!</p>
			<img src="{{ asset('/assets/dashboard/illustration/cart_illustration.svg') }}" alt="cart">
			<p>Atau masukkan lebih banyak item lagi!</p>
			<a href="{{ url('/') }}">homepage</a>
		</div>
	</div>
	<div class="col-3">
		<div class="jc-b ai-c card-cart-small">
			<div class="col">
				<p> <img src="{{ asset('/assets/dashboard/icons/cart_icon_orange.svg') }}" alt="cart"> 3 item</p>
			</div>
			<div class="col">
				<button><img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="delete">Hapus Semua</button>
			</div>
		</div>

		<div class="cart-list-item">
			<div class="cart-item">
				<img src="{{ asset('storage/photos/example.jpg') }}" alt="example">
				<div class="description">
					<p>Flat Illustration</p>
					<div class="row">
						<p>Rp150.000,00</p>
						<img src="{{ asset('/assets/dashboard/icons/delete_icon_red.svg') }}" alt="delete">
					</div>
				</div>
			</div>
		</div>


		<div class="jc-b ai-c card-cart-small">
			<div class="col">
				<p> <img src="{{ asset('/assets/dashboard/icons/payment_icon.svg') }}" alt="cart"> 3 item</p>
			</div>
			<div class="col">
				<button><img src="{{ asset('/assets/dashboard/icons/dollar_icon.svg') }}" alt="dolar">Bayar Sekarang</button>
			</div>
		</div>
	</div>
</div>

@endsection
	