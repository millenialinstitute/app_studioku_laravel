@extends('layouts.admin')
@section('title'  , 'Detail Member')
@section('member' , 'active')
@section('body')

<div class="row">
	<div class="col">
		<div class="card card-profile">
			<div class="profile">
				<img src="{{ asset('storage/users/' . $member->image) }}" alt="{{ $member->name }}" style="width: 100%">
			</div>
			<div class="text-center">
				<h2>{{ $member->name }}</h2>
				<h3>{{ $member->email }}</h3>
			</div>
			<p>Cilacap , Jawa Tengah , Indonesia</p>
			<p>Member sejak {{ substr($member->created_at, 0 , 10) }}</p>
		</div>
	</div>
	<div class="col-2">
		<div class="card row list-data">
			<div class="col list-item text-center" style="border-right: 2px solid #a8afcc;">
				<h1 class="value">{{ $member->member->owned->count() }}</h1>
				<h4 class="key">Unduhan</h4>
			</div>
			<div class="col list-item text-center">
				<h1 class="value">{{ $member->likes->count() }}</h1>
				<h4 class="key">Favorite</h4>
			</div>
			<div class="col list-item text-center" style="border-left: 2px solid #a8afcc;">
				<h1 class="value">{{ $member->member->collection->count() }}</h1>
				<h4 class="key">Koleksi</h4>
			</div>
		</div>
		<div class="card biodata">
			<div class="row">
				<div class="col">Nama Lengkap</div>
				<div class="col-2">{{ $member->name }}</div>
			</div>
			<div class="row">
				<div class="col">Email</div>
				<div class="col-2">{{ $member->email }}</div>
			</div>
			<div class="row">
				<div class="col">No.Hp</div>
				<div class="col-2">0892919291929</div>
			</div>
			<div class="row">
				<div class="col">Alamat</div>
				<div class="col-2">
					{{ $member->member->address }}
				</div>
			</div>
			<div class="row">
				<div class="col">Bergabung sejak</div>
				<div class="col-2">{{ substr($member->created_at, 0 , 10) }}</div>
			</div>
		</div>
	</div>
</div>	

@endsection
	