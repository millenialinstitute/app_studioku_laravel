@extends('layouts.admin')
@section('title' , 'Dashboard Admin')
@section('dashboard' , 'active')
@section('body')

{{-- thumbnail --}}
<div class="row">
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/contributor_illustration.svg') }}" alt="contributor">
			<div class="content">
				<h4 class="value">{{ $contributors }}</h4>
				<p class="description">Kontributor</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/member_illustration.svg') }}" alt="member">
			<div class="content">
				<h4 class="value">{{ $members }}</h4>
				<p class="description">Member</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/collection_illustration.svg') }}" alt="collection">
			<div class="content">
				<h4 class="value"> {{ $itemsCount }} </h4>
				<p class="description">Item</p>
			</div>
		</div>
	</div>
</div>



{{-- Data kontributor --}}
<div class="row">
	<div class="col">
		<h3 class="title-section">Kontributor Teratas</h3>	
		@forelse($topContributors as $contributor)
			<div class="card-item">
				<p class="number">{{ $loop->iteration }}</p>
				<div class="preview" style="overflow: hidden;">
					<img src="{{ asset('storage/users/' . $contributor->user->image) }}" alt="" class="img">
				</div>
				<div class="content">
					<h4 class="title">{{ $contributor->user->name }}</h4>
					<div class="data row">
						<div class="item">
							<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
							<span>{{ $contributor->item->count() }}</span>
						</div>
						<div class="cart">
							<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
							<span>{{ $contributor->item->where('sold' , '>' , 0)->count() }}</span>
						</div>
					</div>
				</div>
			</div>
		@empty
			<h3>Tidak ada contributor</h3>
		@endforelse
			
	</div>
	<div class="col">
		<h3 class="title-section">Penjualan Teratas</h3>
		@forelse($topItems as $item)
			<div class="card-item">
				<p class="number">{{ $loop->iteration }}</p>
				<div class="preview">
					<img src="{{ asset('storage/photos/' . $item->image) }}" alt="" class="img">
				</div>
				<div class="content">
					<h4 class="title">{{ $item->title }}</h4>
					<div class="data row">
						<div class="cart">
							<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
							<span>{{ $item->sold }}</span>
						</div>
					</div>
				</div>
			</div>
		@empty
			<h3>Tidak ada item</h3>
		@endforelse
			
	</div>
</div>


@endsection