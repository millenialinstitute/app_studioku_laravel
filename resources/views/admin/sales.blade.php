@extends('layouts.admin')
@section('title' , 'Penjualan')
@section('sales' , 'active')
@section('body')


{{-- thumbnail --}}
<div class="row">
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/contributor_illustration.svg') }}" alt="contributor">
			<div class="content">
				<h4 class="value">2</h4>
				<p class="description">Item Terjual</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/waiting_illustration.svg') }}" alt="waiting">
			<div class="content">
				<h4 class="value">2</h4>
				<p class="description">Bulan Ini</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/waiting_illustration.svg') }}" alt="waiting">
			<div class="content">
				<h4 class="value">2</h4>
				<p class="description">Bulan lalu</p>
			</div>
		</div>
	</div>
</div>


<h3 class="title-section">Penjualan Teratas</h3>
<div class="card-item">
	<p class="number">1</p>
	<div class="preview"></div>
	<div class="content">
		<h4 class="title">Flat Illustration</h4>
		<p class="cost">Rp50.000,00</p>
	</div>
</div>
<div class="card-item">
	<p class="number">2</p>
	<div class="preview"></div>
	<div class="content">
		<h4 class="title">Flat Illustration</h4>
		<p class="cost">Rp50.000,00</p>
	</div>
</div>
<div class="card-item">
	<p class="number">3</p>
	<div class="preview"></div>
	<div class="content">
		<h4 class="title">Flat Illustration</h4>
		<p class="cost">Rp50.000,00</p>
	</div>
</div>


<h3 class="title-section">Penjualan Item</h3>
<div class="card-item">
	<p class="number">1</p>
	<div class="preview"></div>
	<div class="content">
		<h4 class="title">Flat Illustration</h4>
		<p class="cost">Rp50.000,00</p>
	</div>
</div>
<div class="card-item">
	<p class="number">2</p>
	<div class="preview"></div>
	<div class="content">
		<h4 class="title">Flat Illustration</h4>
		<p class="cost">Rp50.000,00</p>
	</div>
</div>
<div class="card-item">
	<p class="number">3</p>
	<div class="preview"></div>
	<div class="content">
		<h4 class="title">Flat Illustration</h4>
		<p class="cost">Rp50.000,00</p>
	</div>
</div>

@endsection