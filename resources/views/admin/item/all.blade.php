@extends('layouts.admin')
@section('title'  , 'Semua Item')
@section('item' , 'active')
@section('body')

{{-- thumbnail --}}
<div class="row">
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/collection_illustration.svg') }}" alt="collection">
			<div class="content">
				<h4 class="value"> {{ $itemTotal }} </h4>
				<p class="description">Total Item</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/waiting_illustration.svg') }}" alt="waiting">
			<div class="content">
				<h4 class="value"> {{ $itemWait }} </h4>
				<p class="description">Menunggu Persetujuan</p>
			</div>
		</div>
	</div>
</div>


{{-- =========== Top Item ============ --}}
<h3 class="title-section">Item Teratas</h3>
@forelse($topItems as $item)
	<div class="card-item">
		<div class="row" style="align-items: center;width: 70%;justify-content: flex-start;">
			<p class="number">{{ $loop->iteration }}</p>
			<div class="preview">
				<img src="{{ asset('storage/photos/' . $item->image) }}" alt="photo" class="img">
			</div>
			<div class="content ml-2">
				<h4 class="title">{{ $item->title }}</h4>
				<div class="data">
					<span>{{ $item->sold }} Terjual</span>
					<span>{{ $item->like->count() }} Disukai</span>
					<span>{{ $item->collection->count() }} Dikoleksi</span>
				</div>
			</div>
		</div>
		<div class="profile">
			<img src="{{ asset('storage/users/user.jpg') }}" alt="user" class="img">
		</div>
	</div>
@empty
	<h1>Tidak ada item</h1>
@endforelse
{{-- ################ Top Item ##################### --}}



{{-- ============ All Item =============== --}}
<h3 class="title-section">Semua Item</h3>
@forelse($items as $item)
	<div class="card-item">
		<div class="row" style="align-items: center;width: 70%;justify-content: flex-start;">
			<p class="number">@include('components.iteration' , ['paginate' => 5])</p>
			<div class="preview">
				<img src="{{ asset('storage/photos/' . $item->image) }}" alt="photo" class="img">
			</div>
			<div class="content ml-2">
				<h4 class="title"> {{ $item->title }} </h4>
				<div class="data">
					<span>{{ $item->sold }} Terjual </span>
					<span>{{ $item->like->count() }} Disukai </span>
					<span>{{ $item->collection->count() }} Dikoleksi</span>
				</div>
			</div>
		</div>
		<div class="profile">
			<img src="{{ asset('storage/users/' . $item->contributor->user->image) }}" alt="user" class="img">
		</div>
		<div class="action">
			<a href="{{ url('admin/item/detail/' . $item->id) }}" class="btn-icon bg-warn">
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
	<h1>Tidak ada Item!</h1>
@endforelse
{{ $items->links() }}
{{-- ############ All Item ################ --}}



@endsection
	