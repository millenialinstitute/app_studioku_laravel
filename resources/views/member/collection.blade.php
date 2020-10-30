@extends('layouts.member')
@section('title'  , 'Colllection')
@section('collection' , 'active')
@section('body')

<div class="row">
	<div class="col-2">
		<h3 class="title-section">Daftar Koleksi</h3>
		<ul>
			@forelse($collections as $collect)
				<li>{{ $collect->name }} : {{ $collect->item->count() }} </li>
			@empty
				<li>Tidak ada koleksi</li>
			@endforelse
				
		</ul>
	</div>
	<div class="col">
		<h3 class="title-section">Buat Koleksi</h3>
		<form action="{{ url('member/collection/create') }}" class="card-form" method="post">
			@csrf
			<input type="text" name="name" class="form-control">
			<div class="text-right">
				<button class="btn-save mr-2">Simpan</button>
			</div>
		</form>
	</div>
</div>
	

@endsection
	