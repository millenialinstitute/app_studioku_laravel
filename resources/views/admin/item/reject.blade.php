@extends('layouts.admin')
@section('title'  , 'Item Ditolak')
@section('item' , 'active')
@section('body')

<div class="row">
	<div class="col">

		{{-- ++++++++++++ Form Create Data ++++++++++++++++ --}}

		<h3 class="title-section">Buat Alasan Penolakan</h3>
		<form action=" {{ url('/admin/item/reject') }} " method="post" class="card-form">
			@csrf
			<div class="mb-1">
				<label for="title" class="ml-1">Judul</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="mb-1">
				<label for="" class="ml-1">Deskripsi</label>
				<textarea name="description" id="descriptionReject" cols="30" rows="10"></textarea>
			</div>
			<button>Simpan</button>
		</form>

		{{-- ============== Form Create Data ============= --}}
	</div>
	<div class="col-2">

		{{-- ++++++++++++++ List Data Reason ++++++++++++++ --}}
		<h3 class="title-section">Daftar Penolakan</h3>

		@forelse($rejects as $reject)
			<div class="reject-reason">
				<h4>{{ $loop->iteration }}. {{ $reject->title }} 
					<form action="{{ url('admin/item/reject/' . $reject->id . '/delete') }}" method="post" style="display: inline-block;">
						@csrf
						@method('delete')
						<button style="background: transparent; outline: none" >
							<img src="{{ asset('/assets/dashboard/icons/rejection_icon.svg') }}" alt="reject">
						</button>
					</form>
				</h4>
				<p>{{ $reject->description }}</p>
			</div>
		@empty
			<div class="reject-reason">
				<p>Tidak ada data!</p>
			</div>
		@endforelse
		{{-- ############## List Data Reason ############## --}}
	</div>
</div>

@endsection
	