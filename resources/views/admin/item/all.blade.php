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
<div class="card-item">
	<div class="row" style="align-items: center;width: 70%;justify-content: flex-start;">
		<p class="number">1</p>
		<div class="preview">
			<img src="{{ asset('storage/photos/example.jpg') }}" alt="photo" class="img">
		</div>
		<div class="content ml-2">
			<h4 class="title">Judul Item</h4>
			<div class="data">
				<span>200 Terjual</span>
				<span>200 Terjual</span>
				<span>200 Terjual</span>
			</div>
		</div>
	</div>
	<div class="profile">
		<img src="{{ asset('storage/users/user.jpg') }}" alt="user" class="img">
	</div>
</div>
{{-- ################ Top Item ##################### --}}



{{-- ============ All Item =============== --}}
<h3 class="title-section">Semua Item</h3>
<div class="card-item">
	<div class="row" style="align-items: center;width: 70%;justify-content: flex-start;">
		<p class="number">1</p>
		<div class="preview">
			<img src="{{ asset('storage/photos/example.jpg') }}" alt="photo" class="img">
		</div>
		<div class="content ml-2">
			<h4 class="title">Judul Item</h4>
			<div class="data">
				<span>50 Terjual </span>
				<span>50 Disukai </span>
				<span>50 Dikoleksi</span>
			</div>
		</div>
	</div>
	<div class="profile">
		<img src="{{ asset('storage/users/user.jpg') }}" alt="user" class="img">
	</div>
	<div class="action">
		<a href="{{ url('admin/item/') }}" class="btn-icon bg-warn">
			<img src="{{ asset('/assets/dashboard/icons/detail_icon.svg') }}" alt="detail">
		</a>
		<a href="{{ url('admin/item/') }}" class="btn-icon bg-danger">
			<img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="detail">
		</a>
	</div>
</div>
{{-- ############ All Item ################ --}}



@endsection
	