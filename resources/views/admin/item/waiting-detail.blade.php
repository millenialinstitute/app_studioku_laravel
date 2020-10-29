@extends('layouts.admin')
@section('title'  , 'Detail Item')
@section('item' , 'active')
@section('body')

<h3 class="title-section">Detail Item</h3>

<div class="item-detail">
	<div class="row">
		<div class="col">
			<div class="preview">
				<img src=" {{ asset('storage/photos/example.jpg') }} " alt="example" class="img">
			</div>
			<a href="" class="btn-download">download file</a>
		</div>
		<div class="col-2">
			<form action="">
				@csrf
				<div class="item-data">
					<p class="label">Judul</p>
					<p class="value">{{ $item->title }}</p>
				</div>
				<div class="item-data">
					<p class="label">Kategori</p>
					<p class="value">{{ $item->category->name }}</p>
				</div>
				<div class="item-data">
					<p class="label">Tag</p>
					<p class="value">{{ $item->tag->first()->tag->name }}</p>
				</div>
				<div class="item-data">
					<p class="label">Harga</p>
					<p class="value">Rp{{ number_format($item->cost , 2 ,',', '.') }}</p>
				</div>
			</form>
		</div>
	</div>
	<div class="text-right mt-3">
		<a href="" class="btn-accept">Diterima</a>
		<button class="btn-reject">Ditolak</button>
	</div>
</div>


<div class="modal" id="modalReject" >
	<div class="modal-header text-center">
		<h2>Pilih Alasan Penolakan</h2>
	</div>
	<div class="modal-body">
		<form action="{{ url('admin/item/reject/' . $item->id . '/reject') }}" method="post">
			@csrf
			<ul>
				@forelse($rejects as $reject)
					<li><input type="checkbox" name="reason_{{ $reject->id }}" value="{{ $reject->id }}">{{ $reject->title }}</li>
				@empty
					<li>Tidak ada data!</li>
				@endforelse
			</ul>
			<button>Kirim</button>
		</form>
	</div>
</div>	


@endsection
	