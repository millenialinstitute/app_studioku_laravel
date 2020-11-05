@extends('layouts.admin')
@section('title'  , 'Item Menunggu')
@section('item' , 'active')
@section('body')

{{-- thumbnail --}}
<div class="row">
	<div class="col">
		@include('subview.card-thumb' , [
				'img' => 'collection_illustration.svg',
				'value' => $itemTotal,
				'caption' => 'Total Item',		
			])
	</div>
	<div class="col">
		@include('subview.card-thumb' , [
				'img' => 'admin/waiting_illustration.svg',
				'value' => $itemWait,
				'caption' => 'Menunggu Persetujuan',		
			])
	</div>
</div>



{{-- ============== Item Waiting List ================== --}}
<h3 class="title-section">Menunggu Persetujuan</h3>

@forelse($items as $item)
	<div class="card-item">
		<div class="row"  style="align-items: center;width: 70%;justify-content: flex-start;">
			<p class="number">@include('components.iteration' , ['paginate' => 5])</p>
			<div class="preview">
				<img src="{{ asset('storage/photos/' . $item->image) }}" alt="" class="img">
			</div>
			<div class="content ml-2">
				<h4 class="title">{{ $item->title }}</h4>
				<div class="data">
					<span>{{ $item->created_at }}</span>
				</div>
			</div>
		</div>
		<div class="profile">
			<img src="{{ asset('storage/users/user.jpg') }}" alt="user" class="img">
		</div>
		<div class="action">
			<a href="{{ url('admin/item/waiting/' . $item->id) }}" class="btn-icon bg-warn">
				<img src="{{ asset('/assets/dashboard/icons/detail_icon.svg') }}" alt="detail">
			</a>
		</div>
	</div>
@empty
	<h1>Tidak ada data!</h1>
@endforelse

{{ $items->links() }}

{{-- ############## Item Waiting List ################# --}}

@endsection
	