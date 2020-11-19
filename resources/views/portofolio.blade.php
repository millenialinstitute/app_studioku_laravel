@extends('layouts.landing')
@section('title'  , 'Portofolio')
@section('body')

<div class="row">
	<div class="col">
		<img src="{{ asset('storage/users/' . $contributor->user->image) }}" alt="user" style="height: 250px">
		<h3>{{ $contributor->user->name }}</h3>
		<div class="row">
			<div class="col text-center">
				<div class="card-contributor">
					<img src="{{ asset('/assets/dashboard/illustration/collection_illustration.svg') }}" alt="collection">
					<h4 class="text-blue">10 Item</h4>
				</div>
			</div>
			<div class="col text-center">
				<div class="card-contributor">
					<img src="{{ asset('/assets/dashboard/illustration/sold_illustration.svg') }}" alt="cart">
					<h4 class="text-success">500 Terjual</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="col-3 list-images">
		@foreach($contributor->item->chunk(4) as $chunk)
			<div class="row">
				@foreach($chunk as $item)
					<div class="col">
						<a href="{{ url('/item/detail/' . $item->id) }}" class="card-thumbnail">
							<div class="image" style="background: white">
								<img src="{{ asset('storage/photos/' . $item->image) }}" alt="example">
							</div>
							<div class="detail"> 
								<p class="cost">Rp{{ number_format($item->cost , 2 ,',' , '.') }}</p>  
								<div class="row">
									<span class="">
										12 Disukai
									</span>
									<span class="">
										12 Dibeli
									</span>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		@endforeach
	</div>
</div>

@endsection
	