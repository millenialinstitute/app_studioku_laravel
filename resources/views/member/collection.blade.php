@extends('layouts.member')
@section('title'  , 'Colllection')
@section('collection' , 'active')
@section('body')

<div class="row">
	<div class="col-2 list-collection">
		<h3 class="title-section">Daftar Koleksi</h3>
		@forelse($collections->chunk(2) as $chunk)
			<div class="row">
				@foreach($chunk as $key => $collect)
					<div class="col" >
						<div class="card card-collection">
							@foreach($collect->item->chunk(2) as $chunk)
								<div class="row">
									@foreach($chunk as $item)
										<div class="thumb">
											<img src="{{ asset('storage/photos/' . $item->item->image) }}" alt="image" style="width: 100%">
										</div>
									@endforeach
								</div>
							@endforeach
						</div>
						<h3 class="text-center">
							<a href="{{ url('member/collection/detail/' . $collect->id) }}">
								{{ $collect->name }}
							</a>
						</h3>
					</div>	
				@endforeach
			</div>			
		@empty
			<h1>Tidak ada koleksi</h1>
		@endforelse

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
	