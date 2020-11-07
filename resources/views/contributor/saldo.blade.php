@extends('layouts.contributor')
@section('title' , 'Saldo')
@section('saldo' , 'active')
@section('body')

{{-- thumbnail --}}
<div class="row">
	<div class="col">
		@include('subview.card-thumb' , [
				'img'     => 'collection_illustration.svg',
				'value'   => substr($total, 0,-5)/10 . ' Jt',
				'caption' => 'Total Terjual'
 			])
	</div>
	<div class="col">
		@include('subview.card-thumb' , [
				'img'     => 'collection_illustration.svg',
				'value'   => $currentMonth,
				'caption' => 'Bulan Ini'
 			])
	</div>
	<div class="col">
		@include('subview.card-thumb' , [
				'img'     => 'collection_illustration.svg',
				'value'   => $monthAgo,
				'caption' => 'Bulan Lalu'
 			])
	</div>
</div>	



@endsection