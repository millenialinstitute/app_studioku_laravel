@extends('layouts.member')
@section('title'  , 'Favorite')
@section('favorite' , 'active')
@section('body')

<h3 class="title-section">Item Disukai</h3>

@forelse($items->chunk(4) as $chunk)
	<div class="row">
		@foreach($chunk as $item)
			@php  $item = $item->item  @endphp
			<div class="col">
				<a href="{{ url('/item/detail/' . $item->id) }}" class="item-thumbnail">
					<img src="{{ asset('storage/photos/' . $item->image) }}" alt="image" class="img">
				</a>
			</div>
		@endforeach
	</div>
@empty
	<h3>Tidak ada item</h3>
@endforelse
	

@endsection
	