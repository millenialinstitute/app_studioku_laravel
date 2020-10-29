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
				<img src="{{ asset('/assets/landing/icons/like_icon_red.svg') }}" alt="like">
				<p>12 suka</p>
			</div>
			<div class="col">
				<img src="{{ asset('/assets/landing/icons/share_icon.svg') }}" alt="share">
				<p>Share</p>
			</div>
			<div class="col-3">
				<button class="btn-collect">
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

@endsection
	