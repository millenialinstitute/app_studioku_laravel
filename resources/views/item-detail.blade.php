@extends('layouts.landing')
@section('title'  , 'Detail Item')
@section('Item' , 'active')
@section('body')



<div class="title-image">
	<h2>{{ $item->title }}</h2>
	<h3 class="sold">50 Terjual</h3>
</div>
<div class="row">
	<div class="col-2">
		<div class="preview-image">
			<img src="{{ asset('storage/photos/' . $item->image) }}" alt="{{ $item->title }}">
		</div>
		<div class="menu-image row">
			<div class="col">
				<form action="{{ url('/item/detail/' . $item->id .'/like') }}" method="post">
					@csrf
					<button>
						@if($like)
							<img src="{{ asset('/assets/landing/icons/liked_icon.svg') }}" alt="like">
						@else
							<img src="{{ asset('/assets/landing/icons/like_icon_red.svg') }}" alt="like">
						@endif
						<p>12 suka</p>
					</button>
				</form>
			</div>
			<div class="col">
				<img src="{{ asset('/assets/landing/icons/share_icon.svg') }}" alt="share">
				<p>Share</p>
			</div>
			<div class="col-3">
				<button class="btn-collect" id="btnCollect">
					<img src="{{ asset('/assets/landing/icons/collect_icon.svg') }}" alt="collect">
					<p>Simpan ke Koleksi</p>
				</button>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="data-image">
			<h3>File Vector:</h3>
			<p>Format Eps</p>

			<h3 class="mt-2">Lisensi Konten Sutidoku :</h3>
			<ul>
				<li>Konten bebas digunakan pribadi maupun komersial</li>
				<li>Konten bebas digunakan dimedia digital ataupun cetak</li>
				<li>Konten bebas untuk dimodifikasi</li>
			</ul>
			<a href="" class="link-info">info lebih lanjut</a>

			<h1 class="cost">Rp{{ number_format($item->cost , 2 ,',' ,'.') }}</h1>
			<a href="" class="btn-cart">Masukkan Keranjang</a>
			<a href="" class="btn-buy">Beli Sekarang</a>
		</div>
	</div>
</div>


<div class="modal row" id="modalCollect">
		<div class="col row" style="align-items: center">
			<img src="{{ asset('storage/photos/' . $item->image) }}" alt="{{ $item->title }}" style="width: 100%">
		</div>
		<div class="col">
			<form action="{{ url('/member/collection/item/' . $item->id . '/add') }}" method="post">
				@csrf
				<h2>Pilih Koleksi</h2>
				<ul>
					@forelse($collections as $collection)
						<li data-id=" {{ $collection->id }} " >{{ $collection->name }}</li>
					@empty
						<li>Tidak ada data!</li>
					@endforelse
				</ul>
				<div class="text-center">
					<input type="hidden" name="collections">
					<button>Simpan</button>
				</div>
			</form>
		</div>
</div>


@endsection
	