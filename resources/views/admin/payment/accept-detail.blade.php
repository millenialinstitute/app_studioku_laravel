@extends('layouts.admin')
@section('title'  , 'Detail Pembayaran')
@section('payment' , 'active')
@section('body')

<div class="row payment-confirm">
	<div class="col">
		<h3 class="title-section">Informasi Tagihan</h3>
		<div class="card">
			<div class="row">
				<span class="col-2">Nama</span>
				<span class="col-3">{{ $payment->member->user->name }}</span>
			</div>
			<div class="row">
				<span class="col-2">Email</span>
				<span class="col-3">{{ $payment->member->user->email }}</span>
			</div>
			<div class="row">
				<span class="col-2">No.Hp</span>
				<span class="col-3">089818291928</span>
			</div>
			<div class="row">
				<span class="col-2">Alamat</span>
				<span class="col-3">{{ $payment->member->address }}</span>
			</div>
			<div class="row">
				<span class="col-2">Kota</span>
				<span class="col-3">Cilacap</span>
			</div>
			<div class="row">
				<span class="col-2">Provinsi</span>
				<span class="col-3">Jawa Tengah</span>
			</div>
		</div>
	</div>
	<div class="col">
		<h3 class="title-section">Pembayaran</h3>
		<div class="card">
			<div class="row">
				<span class="col-2">Bank Member</span>
				<span class="col-3">{{ $payment->bank }}</span>
			</div>
			<div class="row">
				<span class="col-2">No.Rekening</span>
				<span class="col-3">{{ $payment->card_number }}</span>
			</div>
			<div class="row">
				<span class="col-2">Nasabah</span>
				<span class="col-3">{{ $payment->customer }}</span>
			</div>
			<div class="row">
				<span class="col-2">Total</span>
				<span class="col-3">{{ number_format($payment->total , 2 , ',' ,'.') }}</span>
			</div>
			<div class="row">
				<span class="col-2">Bank Penerima</span>
				<span class="col-3">{{ $payment->bankTarget->name }}</span>
			</div>
			<div class="row">
				<span class="col-2">Tanggal Pembayaran</span>
				<span class="col-3">{{ substr($payment->created_at, 0 , 10) }}</span>
			</div>
		</div>
	</div>
</div>


<div class="list-item">
	<h3 class="title-section">Daftar Item</h3>
	@foreach($payment->cart->item as $item)
		@php
			$item = $item->item
		@endphp
		<div class="item-list-item">
			<div class="preview">
				<img src="{{ asset('storage/photos/' . $item->image) }}" alt="{{ $item->title }}" style="width: 100%">
			</div>
			<div class="content">
				<p class="title">{{ $item->title }}</p>
				<p class="category">Kategori : {{ $item->category->name }}</p>
				<div class="tags">
					<span class="tag">{{ $item->tag->first()->tag->name }}</span>
				</div>
				<div class="data">
					<span class="date">
						<img src="{{ asset('/assets/dashboard/icons/date_icon.svg') }}" alt="date" class="price">
						{{ str_replace('-', '/', substr($item->created_at, 0 , 10)) }}
					</span>
					<span class="price">
						<img src="{{ asset('/assets/dashboard/icons/price_icon.svg') }}" alt="price">
						Rp{{ number_format($item->cost , 2 ,',' , '.') }}
					</span>
				</div>
			</div>
		</div>
	@endforeach
		
</div>

<div class="row confirm-action">
	<div>
		<a style="display: inline-block;" href="{{ url('admin/payment/download/proof/' . $payment->id) }}" target="_blank" class="btn-download">Unduh Bukti</a>
	</div>
</div>


@endsection
	