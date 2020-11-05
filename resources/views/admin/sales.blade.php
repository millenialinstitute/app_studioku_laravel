@extends('layouts.admin')
@section('title' , 'Penjualan')
@section('sales' , 'active')
@section('body')



@php
	if(!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
@endphp

{{-- thumbnail --}}
<div class="row">
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/contributor_illustration.svg') }}" alt="contributor">
			<div class="content">
				<h4 class="value">{{ $all }}</h4>
				<p class="description">Item Terjual</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/waiting_illustration.svg') }}" alt="waiting">
			<div class="content">
				<h4 class="value">{{ $current }}</h4>
				<p class="description">Bulan Ini</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/waiting_illustration.svg') }}" alt="waiting">
			<div class="content">
				<h4 class="value">{{ $ago }}</h4>
				<p class="description">Bulan lalu</p>
			</div>
		</div>
	</div>
</div>


<h3 class="title-section">Penjualan Teratas</h3>
@foreach($topSales as $item)
<div class="card-item">
	<p class="number">{{ $loop->iteration }}</p>
	<div class="preview">
		<img src="{{ asset('storage/photos/' . $item->image) }}" alt="{{ $item->title }}" class="img">
	</div>
	<div class="content">
		<h4 class="title">{{ $item->title }}</h4>
		<p class="cost">Rp{{ number_format($item->cost , 2 ,',','.') }}</p>
	</div>
</div>
@endforeach


<h3 class="title-section">Penjualan Item</h3>
@forelse($newestSales->forPage($_GET['page'], 5) as $item)
	<div class="card-item">
		<p class="number">@include('components.iteration' , ['paginate' => 5])</p>
		<div class="preview">
			<img src="{{ asset('storage/photos/' . $item->image) }}" alt="{{ $item->title }}" class="img">
		</div>
		<div class="content">
			<h4 class="title">{{ $item->title }}</h4>
			<p class="cost">Rp{{ number_format($item->cost , 2 ,',','.') }}</p>
		</div>
	</div>
@empty
	<h1>Tidak ada data</h1>
@endforelse

{{-- pagenation --}}
@include('components.pagination' , ['pagination' => $pagination])
  

@endsection