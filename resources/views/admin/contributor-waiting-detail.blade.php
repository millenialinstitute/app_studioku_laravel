@extends('layouts.admin')
@section('title'  , 'Detail Kontributor')
@section('contributor' , 'active')
@section('body')

<h3 class="title-section">Konten Kontributor</h3>

<div class="card card-contributor">
	<div class="profile">
		<img src="{{ asset('storage/users/' . $contributor->user->image) }}" alt="contributor" class="img">
	</div>
	<h3>{{ $contributor->user->name }}</h3>
</div>

@forelse($contributor->item->where('status' , 'waiting') as $item)
	<div class="card-item">
		<div class="row" style="align-items: center;width: 70%;justify-content: flex-start;">
			<p class="number">@include('components.iteration' , ['paginate' => 5])</p>
			<div class="preview">
				<img src="{{ asset('storage/photos/' . $item->image) }}" alt="photo" class="img">
			</div>
			<div class="content ml-2">
				<h4 class="title"> {{ $item->title }} </h4>
			</div>
		</div>
		<div class="action">
			<a href="{{ url('admin/contributor/waiting/' . $contributor->id . '/item/' . $item->id) }}" class="btn-icon bg-warn">
				<img src="{{ asset('/assets/dashboard/icons/detail_icon.svg') }}" alt="detail">
			</a>
			<form action="{{ url('admin/item/destroy/' . $item->id) }}" method="post" style="display: inline-block;">
				@csrf
				@method('delete')
				<button class="btn-icon bg-danger">
					<img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="detail">
				</button>
			</form>
		</div>
	</div>
@empty
	<h3>Tidak ada item</h3>
@endforelse


@endsection
	