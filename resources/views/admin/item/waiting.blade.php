@extends('layouts.admin')
@section('title'  , 'Item Menunggu')
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

{{-- ============== Item Waiting List ================== --}}
<h3 class="title-section">Menunggu Persetujuan</h3>
{{-- ############## Item Waiting List ################# --}}

@endsection
	