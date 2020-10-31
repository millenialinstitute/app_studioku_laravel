@extends('layouts.admin')
@section('title'  , 'Pembayaran Ditolak')
@section('payment' , 'active')
@section('body')

<h3 class="title-section">Pembayaran Ditolak</h3>

@forelse($payments as $data)
	<div class="card-item">
		<div class="row ai-c" style="width: 70%">
			<p class="number">{{ $loop->iteration }}</p>
			<div class="profile">
				<img src="{{ asset('storage/users/' . $data->member->user->image) }}" alt="{{ $data->customer }}" class="img">
			</div>
			<div class="content ml-2">
				<h4 class="title">{{ $data->member->user->name }}</h4>
				<div class="data">
					<span>{{ $data->created_at }}</span>
				</div>
			</div>
		</div>
		<div class="action">
			<a href="{{ url('admin/payment/reject/' . $data->id) }}" class="btn-icon bg-info">
				<img src="{{ asset('/assets/dashboard/icons/detail_icon.svg') }}" alt="detail">
			</a>
		</div>
	</div>
@empty
	<h1>Tidak ada data!</h1>
@endforelse

@endsection
	