@extends('layouts.contributor')
@section('title' , 'Penjualan')
@section('sales' , 'active')
@section('body')

{{-- thumbnail --}}
<div class="row">
	<div class="col">
		@include('subview.card-thumb' , [
				'img' => 'collection_illustration.svg',
				'value' => $total,
				'caption' => 'Total Terjual'
 			])
	</div>
	<div class="col">
		@include('subview.card-thumb' , [
				'img' => 'collection_illustration.svg',
				'value' => $current,
				'caption' => 'Bulan Ini'
 			])
	</div>
	<div class="col">
		@include('subview.card-thumb' , [
				'img' => 'collection_illustration.svg',
				'value' => $ago,
				'caption' => 'Bulan Lalu'
 			])
	</div>
</div>	




{{-- sales --}}
<div class="row">
	<div class="col">
		<h3 class="title-section">Penjualan Teratas</h3>
		@forelse($topSold as $item)
			<div class="card-item">
				<p class="number">{{ $loop->iteration }}</p>
				<div class="preview">
					<img src="{{ asset('storage/photos/' . $item->image) }}" alt="{{ $item->title }}" class="img">
				</div>
				<div class="content">
					<h4 class="title">{{ $item->title }}</h4>
					<p>{{ $item->sold }} Terjual</p>
				</div>
			</div>
		@empty
			<div class="card">
				<h3>Tidak ada item</h3>
			</div>
		@endforelse
			
	</div>
	<div class="col">
		<h3 class="title-section">Penjualan Terakhir</h3>
		@forelse($lastSold as $item)
			<div class="card-item">
				<p class="number">{{ $loop->iteration }}</p>
				<div class="preview">
					<img src="{{ asset('storage/photos/' . $item->image) }}" alt="{{ $item->title }}" class="img">
				</div>
				<div class="content">
					<h4 class="title">{{ $item->title }}</h4>
					<p>{{ $item->sold }} Terjual</p>
				</div>
			</div>
		@empty
			<div class="card">
				<h3>Tidak ada item</h3>
			</div>
		@endforelse
			
	</div>
</div>


@endsection