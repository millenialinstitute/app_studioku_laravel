@extends('layouts.member')
@section('title'  , 'Pembayaran')
@section('cart' , 'active')
@section('body')

<div class="row">
	<div class="col-3">
		<h3 class="title-section">Informasi Tagihan</h3>	
		<div class="card info-profile">
			<p>Data Anda tidak akan diberikan kepada pihak ketiga dari perusahaan tanpa ijin Anda. Info lebih lanjut</p>
			<div class="data-member mt-2 mb-2">
				<div class="row">
					<div class="col">Nama Lengkap</div>
					<div class="col-2">{{ $user->name }}</div>
				</div>
				<div class="row">
					<div class="col">Email</div>
					<div class="col-2">{{ $user->email }}</div>
				</div>
				<div class="row">
					<div class="col">No.Hp</div>
					<div class="col-2">083991928919</div>
				</div>
				<div class="row">
					<div class="col">Alamat</div>
					<div class="col-2">{{ $user->member->address }}</div>
				</div>
			</div>
			<p>Pastikan data Anda benar. Anda bisa mengubah data Anda di menu profil</p>
		</div>

		<h3 class="title-section mt-3">Pembayaran</h3>
		@forelse($banks as $bank)
			<div class="card bank-item">
				<h4>{{ $bank->name }}</h4>
				<p>{{ $bank->customer }}</p>
				<p>{{ $bank->card_number }}</p>
				<div class="text-right">
					<a href="{{ url('member/cart/payment/' . $bank->id) }}" class="btn-confirm">Konfirmasi Pembayaran</a>
				</div>
			</div>
		@empty
			<h3>Tidak ada data!</h3>
		@endforelse
			
	</div>
	<div class="col-2">
		<h3 class="title-section">Ringkasan Pesanan</h3>
		@php
			$totalPayment = 0;
		@endphp
		@forelse($items as $item)
			@php 
				$item = $item->item;
				$totalPayment += $item->cost; 
			@endphp
			<div class="cart-list-item payment-cart">
				<div class="cart-item">
					<img src="{{ asset('storage/photos/' . $item->image) }}" alt="example">
					<div class="description">
						<p> {{ $item->title }} </p>
						<div class="row">
							<p class="cost">Rp{{ number_format($item->cost , 2 ,',' , '.') }} </p>
						</div>
					</div>
				</div>
			</div>
		@empty
			<div class="text-center card-item" style="width: 84%;margin: 20px auto;" >
				<h2>Tidak ada item</h2>
			</div>
		@endforelse
		<div class="jc-b ai-c card-cart-small" style="margin: 10px">
			<div class="col">
				<p> <img src="{{ asset('/assets/dashboard/icons/payment_icon.svg') }}" alt="cart">Total</p>
			</div>
			<div class="col">
				<p>Rp{{ number_format($totalPayment , 2 ,',','.') }}</p>
			</div>
		</div>
	</div>
</div>

@endsection
	