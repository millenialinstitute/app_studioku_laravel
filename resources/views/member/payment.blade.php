@extends('layouts.member')
@section('title'  , 'Pembayaran')
@section('payment' , 'active')
@section('body')

@php
	if(!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
@endphp

<h3 class="title-section">Daftar Pembayaran</h3>

@forelse($payments->forPage($_GET['page'], 5) as $payment)
	<div class="card card-payment">
		<div class="row mr-3" style="align-items: center;">
			<p class="number">@include('components.iteration' , ['paginate' => 5])</p>
			<div class="content">
				<h4>{{ $payment->bank }}</h4>
				<p>{{ $payment->card_number }}</p>
			</div>
		</div>
		<p class="total row" style="align-items: center;"> <img src="{{ asset('/assets/dashboard/icons/price_icon.svg') }}" alt="date" class="mr-1" height="30px">Rp{{ number_format($payment->total , 2 ,',','.') }}</p>
		<div class="badge">
			@if($payment->status === 'waiting')
				<span class="waiting">Menunggu</span>
			@elseif($payment->status === 'reject')
				<span class="reject">Ditolak</span>
			@elseif($payment->status === 'accept')
				<span class="accept">Diterima</span>
			@endif
			<a href="{{ asset('storage/proofs/' . $payment->proof_file) }}" target="_blank" download="payment">Unduh</a>
		</div>
	</div>
@empty
	<h1>Tidak ada data!</h1>
@endforelse



{{-- pagenation --}}
@include('components.pagination' , ['pagination' => $pagination])
	

@endsection
	