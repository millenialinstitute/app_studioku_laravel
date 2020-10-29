@extends('layouts.admin')
@section('title'  , 'Item Tag')
@section('item' , 'active')
@section('body')

<h3 class="title-section">Daftar Tag</h3>
<ul>
	@forelse($tags as $tag)
		<li>{{ $tag->name }}</li>
	@empty
		<li>Tidak ada tag</li>
	@endforelse
</ul>

@endsection
	