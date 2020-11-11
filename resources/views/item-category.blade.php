@extends('layouts.landing')
@section('title'  , 'Item')
@section('body')
	@include('components.banner')

<section class="newest list-images mx-5">
	@forelse($items->chunk(5) as $chunk)
		<div class="row">
			@foreach($chunk as $item)
				<div class="col"><a href="{{ url('item/detail/' . $item->id) }}" class="card-thumbnail"><div class="image" style="background: white"><img src="{{ asset('storage/photos/' . $item->image) }}" alt="example"></div><div class="detail"> <p>Rp{{ number_format($item->cost , 2 ,',' , '.') }}</p>  </div></a></div>
			@endforeach
		</div>
	@empty
		<h1>Tidak ada item</h1>
	@endforelse
</section>

@endsection
		