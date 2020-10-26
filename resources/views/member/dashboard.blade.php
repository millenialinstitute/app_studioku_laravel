@extends('layouts.member')
@section('title'  , 'Dashboard')
@section('dashboard' , 'active')
@section('body')


{{-- thumbnail --}}
<div class="row">
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/download_illustration.svg') }}" alt="download">
			<div class="content">
				<h4 class="value">2</h4>
				<p class="description">Unduhan</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/favorite_illustration.svg') }}" alt="favorite">
			<div class="content">
				<h4 class="value">2</h4>
				<p class="description">Item Suka</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/collection_illustration.svg') }}" alt="collection">
			<div class="content">
				<h4 class="value">2</h4>
				<p class="description">Koleksi</p>
			</div>
		</div>
	</div>
</div>


@endsection