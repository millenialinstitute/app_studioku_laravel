@extends('layouts.member')
@section('title'  , 'Detail Koleksi')
@section('collection' , 'active')
@section('body')

<h3 class="title-section">{{  $collection->name }}</h3>
@forelse($collection->item->chunk(4) as $chunk)
	<div class="row">
		@foreach($chunk as $data)
			@php $item = $data->item @endphp
			<div class="col">
				<a href="{{ url('/item/detail/' . $item->id) }}" class="item-thumbnail">
					<img src="{{ asset('storage/photos/' . $item->image) }}" alt="image" class="img">
				</a>
			</div>
			@endforeach
	</div>
@empty
	<h1>Tidak ada item</h1>
@endforelse
	

@endsection
	