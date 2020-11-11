@extends('layouts.landing')
@section('title'  , 'Detail Item')
@section('Item' , 'active')
@section('body')



<div class="row mt-5">
	<div class="col-2">
		<div class="preview-image">
			<img src="{{ asset('storage/photos/' . $item->image) }}" alt="{{ $item->title }}">
		</div>
		<div class="menu-image row">
			<form action="{{ url('/item/detail/' . $item->id .'/like') }}" method="post">
				@csrf
				<button class="btn-like">
					@if($like)
						<img src="{{ asset('/assets/landing/icons/liked_icon.svg') }}" class="mr-1" alt="like">
					@else
						<img src="{{ asset('/assets/landing/icons/like_icon_red.svg') }}" class="mr-1" alt="like">
					@endif
					<p>{{ $item->like->count() }} suka</p>
				</button>
			</form>
			<button class="btn-share">
				<img src="{{ asset('/assets/landing/icons/share_icon.svg') }}" class="mr-1" alt="share">
				<p>Share</p>
			</button>
			<button class="btn-collect" id="btnCollect">
				<img src="{{ asset('/assets/landing/icons/collect_icon.svg') }}" alt="collect">
				<p>Simpan ke Koleksi</p>
			</button>
		</div>
	</div>
	<div class="col">
		<div class="data-image">
			<h3>{{ $item->title }}</h3>
			<p class="sold">{{ $item->owned->count() }} Terjual</p>
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
			<form action="{{ url('member/cart/item/' . $item->id .'/add') }}" style="display: block;" method="post">
				@csrf
				<button style="display: block;" class="btn-cart">Masukkan Keranjang</button>
			</form>
			<a href="{{ url('member/cart/item/' . $item->id .'/buy') }}" class="btn-buy">Beli Sekarang</a>
		</div>
		<div class="card-author">
			<div class="profile">
				<img src="{{ asset('storage/users/user.jpg') }}" alt="user" width="80px">
			</div>
			<div class="bio">
				<h4>Atika Mahmudah</h4>
				<a href="" class="btn-porto">Portofolio</a>
			</div>
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
					<button type="button">Batal</button>
					<button type="submit">Simpan</button>
				</div>
			</form>
		</div>
</div>


@endsection
	