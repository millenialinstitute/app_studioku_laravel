@extends('layouts.member')
@section('title'  , 'Konfirmasi Pembayaran')
@section('cart' , 'active')
@section('body')

<h3 class="title-section">Konfirmasi Pembayaran</h3>

<div class="card payment-confirm">
	<div class="form-group">
		<label for="bank_target">Bank Tujuan </label>
		<input type="text" disabled="true" value="{{ $bank->name }}" id="bank_target" name="bank_target" class="form-control ">
	</div>
	<div class="form-group">
		<label for="payment_date">Tanggal Pembayaran </label>
		<input type="text" disabled="true" value="{{ date('l , d F Y') }}" id="payment_date" name="payment_date" class="form-control ">
	</div>
	<div class="form-group">
		<label for="total_payment">Total Pembayaran </label>
		<input type="text" disabled="true" value="Rp{{ number_format($payment , 2 ,',' , '.') }}" id="total_payment" name="total_payment" class="form-control ">
	</div>
	<form action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="member_bank">Bank Anda </label>
			<input type="text" id="member_bank" name="member_bank" class="form-control ">
		</div>
		<div class="form-group">
			<label for="card_number">Nomor Rekening </label>
			<input type="text" id="card_number" name="card_number" class="form-control ">
		</div>
		<div class="form-group">
			<label for="customer">Nama Nasabah </label>
			<input type="text" id="customer" name="customer" class="form-control ">
		</div>
		<div class="form-group">
			<label for="proof">Bukti Pembayaran </label>
			<input type="file" id="proof" name="proof" class="form-control ">
		</div>
		<input type="hidden" name="total" value="{{ $payment }}">
		<div class="text-right">
			<a href="{{ url()->previous() }}" class="btn-back">Kembali</a>
			<button>Kirim</button>
		</div>
	</form>
</div>

@endsection
	