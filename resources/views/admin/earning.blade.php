@extends('layouts.admin')
@section('title' , 'Keuangan')
@section('earning' , 'active')
@section('body')


<div class="row">
	<div class="col">
		<div class="card-earning mb-3">
			<img src="{{ asset('/assets/dashboard/illustration/earning_illustration.svg') }}" alt="earning">
			<h2>{{ $total }} {{ $totalScope }}</h2>
			<p>Total Pendapatan (Total yang didapat dari penjualan item)</p>
		</div>
	</div>
	<div class="col-2">
		
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="card-earning mb-3">
			<img src="{{ asset('/assets/dashboard/illustration/earning_illustration.svg') }}" alt="earning">
			<h2>30 Jt</h2>
			<p>Total Pendapatan (Total yang didapat dari penjualan item)</p>
		</div>
	</div>
	<div class="col-2">
		
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="card-earning mb-3">
			<img src="{{ asset('/assets/dashboard/illustration/earning_illustration.svg') }}" alt="earning">
			<h2>30 Jt</h2>
			<p>Total Pendapatan (Total yang didapat dari penjualan item)</p>
		</div>
	</div>
	<div class="col-2">
		
	</div>
</div>


@endsection