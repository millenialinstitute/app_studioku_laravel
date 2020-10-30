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
				<p> <img src="{{ asset('/assets/dashboard/icons/cart_icon_orange.svg') }}" alt="cart"> {{ $items->count() }} item</p>
			</div>
			<div class="col">
				<form action="{{ url('member/cart/delete/') }}" method="post">
					@csrf
					@method('delete')
					<button><img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="delete">Hapus Semua</button>
				</form>
			</div>
		</div>
		@php
			$totalPayment = 0;
		@endphp
		@forelse($items as $item)
			@php 
				$item = $item->item;
				$totalPayment += $item->cost; 
			@endphp
			<div class="cart-list-item">
				<div class="cart-item">
					<img src="{{ asset('storage/photos/' . $item->image) }}" alt="example">
					<div class="description">
						<p> {{ $item->title }} </p>
						<div class="row">
							<p>Rp{{ number_format($item->cost , 2 ,',' , '.') }} </p>
							<form action="{{ url('member/cart/item/' . $item->id .'/delete') }}" method="post">
								@csrf
								@method('delete')
								<button>
									<img src="{{ asset('/assets/dashboard/icons/delete_icon_red.svg') }}" alt="delete">
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		@empty
			<div class="text-center card-item" style="width: 84%;margin: 20px auto;" >
				<h2>Tidak ada item</h2>
			</div>
		@endforelse
			


		<div class="jc-b ai-c card-cart-small">
			<div class="col">
				<p> <img src="{{ asset('/assets/dashboard/icons/payment_icon.svg') }}" alt="cart">Rp{{ number_format($totalPayment , 2 ,',','.') }}</p>
			</div>
			<div class="col">
				<a href="{{ url('member/cart/payment') }}" class="btn-pay" style="box-sizing: border-box;"><img src="{{ asset('/assets/dashboard/icons/dollar_icon.svg') }}" alt="dolar">Bayar Sekarang</a>
			</div>
		</div>
	</div>
</div>

@endsection
	