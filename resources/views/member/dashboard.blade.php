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
				<h4 class="value">{{ $owned }}</h4>
				<p class="description">Unduhan</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/favorite_illustration.svg') }}" alt="favorite">
			<div class="content">
				<h4 class="value">{{ $likes }}</h4>
				<p class="description">Item Suka</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/collection_illustration.svg') }}" alt="collection">
			<div class="content">
				<h4 class="value">{{ $collection }}</h4>
				<p class="description">Koleksi</p>
			</div>
		</div>
	</div>
</div>



{{-- card contributor --}}
<div class="card-banner row" >
	<div class="col">
		<img src="{{ asset('/assets/landing/illustrations/contributor_illustration.svg') }}" alt="contributor">
	</div>
	<div class="col">
		<h1>Yuk Dapatkan Penghasilan dari karyamu disini!</h1>
		<form action="{{ url('/member/dashboard/contributor') }}" method="post">
			@csrf
			<button>Jadi Kontributor</button>
		</form>
	</div>
</div>


@endsection