@extends('layouts.admin')
@section('title'  , 'Item Ditolak')
@section('item' , 'active')
@section('body')

<div class="row">
	<div class="col">

		{{-- ++++++++++++ Form Create Data ++++++++++++++++ --}}

		<h3 class="title-section">Buat Alasan Penolakan</h3>
		<form action="" class="card-form">
			@csrf
			<div class="mb-1">
				<label for="" class="ml-1">Judul</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="mb-1">
				<label for="" class="ml-1">Deskripsi</label>
				<textarea name="" id="" cols="30" rows="10"></textarea>
			</div>
			<button>Simpan</button>
		</form>

		{{-- ============== Form Create Data ============= --}}
	</div>
	<div class="col-2">

		{{-- ++++++++++++++ List Data Reason ++++++++++++++ --}}
		<h3 class="title-section">Daftar Penolakan</h3>

		<div class="reject-reason">
			<h4>1. Alasan Penolakan <img src="{{ asset('/assets/dashboard/icons/rejection_icon.svg') }}" alt="reject"></h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Commodi, dolore.</p>
		</div>
		{{-- ############## List Data Reason ############## --}}
	</div>
</div>

@endsection
	