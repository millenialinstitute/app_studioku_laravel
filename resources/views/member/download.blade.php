@extends('layouts.member')
@section('title'  , 'Donwload')
@section('download' , 'active')
@section('body')


@php
	if(!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
@endphp

@forelse($items->forPage($_GET['page'], 5) as $item)
	<div class="cart-list-item">
		<div class="cart-item my-item">
			<div class="data">
				<img src="{{ asset('storage/photos/' . $item->image) }}" alt="example" >
				<div>
					<a href="{{ url('/item/detail/' . $item->id) }}" class="title">{{ $item->title }}</a>
					<h5 class="contributor">{{ $item->contributor->user->name }}</h5>
				</div>
			</div>
			<p class="price"><img src="{{ asset('/assets/dashboard/icons/price_icon.svg') }}" alt="icon" style="width: 30px">Rp{{ number_format($item->cost , 2 , ',' ,'.') }}</p>
			<div class="action">
				<a href="" class="btn btn-license">Lisensi</a>
				<a href="{{ url('/member/download/' . $item->id ) }}" target="_blank" class="btn btn-download">Unduh</a>
			</div>
		</div>
	</div>
@empty
	<div class="text-center card-item" style="width: 84%;margin: 20px auto;" >
		<h2>Tidak ada item</h2>
	</div>
@endforelse


{{-- pagenation --}}
@include('components.pagination' , ['pagination' => $pagination])


@endsection
	