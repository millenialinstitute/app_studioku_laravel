@extends('layouts.admin')

@section('title' , 'Kontributor Menunggu')
@section('contributor' , 'active')
@section('body')

{{-- thumbnail --}}
<div class="row">
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/contributor_illustration.svg') }}" alt="contributor">
			<div class="content">
				<h4 class="value">{{ $total }}</h4>
				<p class="description">Kontributor</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/waiting_illustration.svg') }}" alt="waiting">
			<div class="content">
				<h4 class="value">{{ $waiting }}</h4>
				<p class="description">Menunggu Persetujuan</p>
			</div>
		</div>
	</div>
</div>

<h3 class="title-section">Kontributor Teratas</h3>	
@forelse($topContributors as $contributor)
	<div class="card-item">
		<p class="number">{{ $loop->iteration }}</p>
		<div class="profile">
			<img src="{{ asset('storage/users/' . $contributor->user->image) }}" alt="photos" class="img">
		</div>
		<div class="content">
			<h4 class="title">{{ $contributor->user->name }}</h4>
			<div class="data row">
				<span>{{ $contributor->item->where('status' , 'accept')->count() }} Konten</span>
				<span>{{ $contributor->item->where('sold' , '>' , 0)->count() }} Terjual</span>
			</div>
		</div>
		<div class="total">
			<p>Total Pendapatan</p>
			<div class="value">Rp{{ number_format($contributor->saldo , 2, ',','.') }}</div>
		</div>
	</div>
@empty
	<h3>Tidak ada kontributor</h3>
@endforelse


<h3 class="title-section">Kontributor Menunggu</h3>	

@forelse($contributors as $contributor)
	<div class="card-item">
		<p class="number">@include('components.iteration' , ['paginate' => 5])</p>
		<div class="profile">
			<img src="{{ asset('storage/users/' . $contributor->user->image) }}" alt="photos" class="img">
		</div>
		<div class="content">
			<h4 class="title">{{ $contributor->user->name }}</h4>
		</div>
		<div class="action">
			<a href="{{ url('admin/contributor/waiting/' . $contributor->id) }}" class="btn-icon bg-warn">
				<img src="{{ asset('/assets/dashboard/icons/detail_icon.svg') }}" alt="detail">
			</a>
		</div>
	</div>
@empty
	<h1>Tidak ada kontributor</h1>
@endforelse
	
{{ $contributors->links() }}


@endsection