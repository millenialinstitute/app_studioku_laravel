@extends('layouts.admin')
@section('title'  , 'Metode Pembayaran')
@section('payment' , 'active')
@section('body')

<div class="row">
	<div class="col-2 mr-2">
		<h3 class="title-section">Daftar Metode</h3>
		@forelse($banks as $bank)
			<div class="card-bank">
				<form action="{{ url('admin/payment/method/delete/' . $bank->id) }}" method="post" >
					@csrf
					@method('delete')
					<button>
						<img src="{{ asset('assets/dashboard/icons/delete_icon_red.svg') }}" style="width: 100%" alt="delete">
					</button>
				</form>
				<h3>{{ $bank->name }}</h3>
				<h4>{{ $bank->customer }}</h4>
				<p class="card-number">{{ $bank->card_number }}</p>
			</div>
		@empty
			<h2>Tidak ada data!</h2>
		@endforelse
	</div>
	<div class="col">
		<h3 class="title-section">Tambah Metode</h3>
		<form action="{{ url('admin/payment/method/create') }}" class="card-form" method="post">
			@csrf
			<input type="text" class="form-control" name="name" placeholder="Bank">
			<input type="text" class="form-control" name="customer" placeholder="Nasabah">
			<input type="text" class="form-control" name="card_number" placeholder="Nomer Rekening">
			<div class="text-right">
				<button class="mt-1 mr-2">Tambah</button>
			</div>
		</form>
	</div>
</div>

@endsection
	