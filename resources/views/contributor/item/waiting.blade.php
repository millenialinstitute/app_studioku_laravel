@extends('layouts.contributor')
@section('title'  , 'Item Menunggu')
@section('item' , 'active')
@section('body')



<h3 class="title-section">Item Menunggu</h3>

<div class="row">
	<div class="col">
		@include('subview.card-thumb' , [
				'img' => 'collection_illustration.svg',
				'value' => $items->count(),
				'caption' => 'Item Menunggu',
			])
	</div>
	<div class="col-2">
		<div class="waiting-banner">
			<p>Upload Semua Karya Terbaikmu Disini!</p>
			<a href="{{ url('/contributor/item/upload') }}">Upload File</a>
		</div>
	</div>
</div>	


@forelse($items as $item)
	<div class="waiting-item">
		<div class="preview">
			<img src="{{ asset('storage/photos/' . $item->image) }}" class="img" alt="image">
		</div>
		<div class="content">
			<p class="title"> {{ $item->title }} </p>
			<p class="category">Kategory : {{ $item->category->name }}</p>
			<div class="tags">
				<span class="tag" >{{ $item->tag->first()->tag->name }}</span>
			</div>
			<div class="data">
				<span class="date"><img src="{{ asset('/assets/dashboard/icons/date_icon.svg') }}" alt="date" class="price">{{  str_replace('-', '/', substr($item->created_at, 0 , 10))  }}</span>
				<span class="price"><img src="{{ asset('/assets/dashboard/icons/price_icon.svg') }}" alt="price">Rp{{ number_format($item->cost, 2 ,',' , '.') }}</span>
			</div>
		</div>
		<form action="{{  url('contributor/item/destroy/' . $item->id ) }}" method="post">
			@csrf
			@method('delete')
			<button>
				<img src="{{ asset('/assets/dashboard/icons/delete_icon_red.svg') }}" alt="delete">
			</button>
		</form>
	</div>
@empty
	<div class="card-item">
		<h1>Tidak ada data!</h1>
	</div>
@endforelse


@endsection
	