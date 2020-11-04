@extends('layouts.landing')
@section('title' , 'Studioku')
@section('body')



{{-- ---------- Kategori -------------- --}}

<section class="category">
	<h2>Kategori</h2>
	<div class="row">
		<div class="col">
			<a href="{{ url('/item/category/logo') }}" class="card-category"><img src="{{ asset('/assets/landing/category/category_logo.svg') }}" alt="logo"></a>
		</div>
		<div class="col">
			<a href="{{ url('/item/category/icon') }}" class="card-category"><img src="{{ asset('/assets/landing/category/category_icon.svg') }}" alt="icon"></a>
		</div>
		<div class="col">
			<a href="{{ url('/item/category/background') }}" class="card-category"><img src="{{ asset('/assets/landing/category/category_background.svg') }}" alt="background"></a>
		</div>
		<div class="col">
			<a href="{{ url('/item/category/illustration') }}" class="card-category"><img src="{{ asset('/assets/landing/category/category_illustration.svg') }}" alt="illustrasi"></a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a href="{{ url('/item/category/poster') }}" class="card-category"><img src="{{ asset('/assets/landing/category/category_poster.svg') }}" alt="poster"></a>
		</div>
		<div class="col">
			<a href="{{ url('/item/category/brocure') }}" class="card-category"><img src="{{ asset('/assets/landing/category/category_brosur.svg') }}" alt="brosur"></a>
		</div>
		<div class="col">
			<a href="{{ url('/item/category/web') }}" class="card-category"><img src="{{ asset('/assets/landing/category/category_web.svg') }}" alt="web"></a>
		</div>
		<div class="col">
			<a href="{{ url('/item/category/other') }}" class="card-category"><img src="{{ asset('/assets/landing/category/category_other.svg') }}" alt="other"></a>
		</div>
	</div>
</section>



<section class="newest list-images mx-5">
	<h2>Item Terbaru</h2>
	@forelse($itemNewest as $chunk)
		<div class="row">
			@foreach($chunk as $item)
				<div class="col"><a href="{{ url('item/detail/' . $item->id) }}" class="card-thumbnail"><div class="image" style="background: white"><img src="{{ asset('storage/photos/' . $item->image) }}" alt="example"></div><div class="detail"> <p>Rp{{ number_format($item->cost , 2 ,',' , '.') }}</p>  </div></a></div>
			@endforeach
		</div>
	@empty
		<h1>Tidak ada item</h1>
	@endforelse
</section>


<section class="newest list-images mx-5">
	<h2>Item Terbaru</h2>
	@forelse($itemNewest as $chunk)
		<div class="row">
			@foreach($chunk as $item)
				<div class="col"><a href="{{ url('item/detail/' . $item->id) }}" class="card-thumbnail"><div class="image" style="background: white"><img src="{{ asset('storage/photos/' . $item->image) }}" alt="example"></div><div class="detail"> <p>Rp{{ number_format($item->cost , 2 ,',' , '.') }}</p>  </div></a></div>
			@endforeach
		</div>
	@empty
		<h1>Tidak ada item</h1>
	@endforelse
</section>



{{-- ---------------- Divider ----------------------- --}}

<section class="divider text-center">
	<div class="row">
		<div class="col">
			<img src="{{ asset('/assets/landing/illustrations/contributor_illustration.svg') }}" alt="contributor">
		</div>
		<div class="col">
			<h1>yuk dapatkan penghasilan dari karyamu disini</h1>
			<a href="/register" class="button-style">Jadi Kontributor</a>
		</div>
	</div>
</section>

{{-- ---------------- End Divider ----------------------- --}}




{{-- -------------- blogs ------------------------- --}}
<section class="blogs mx-5">
	<h2>Blog</h2>
	<div class="row">
		<div class="col">
			<div class="card-style">
				<div class="card-img">
					<img src="{{ asset('/assets/landing/images/example.jpg') }}" alt="example">
				</div>
				<div class="card-body">
					<h5>Lorem ipsum dolor sit amet consectetur, adipisicing.</h5>
					<p>Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Itaque explicabo eveniet ex earum, ipsum.</p>
				</div>
				<div class="card-footer row">
					<p>Studioku</p>
					<p class="text-right">2 hari yang lalu</p>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card-style">
				<div class="card-img">
					<img src="{{ asset('/assets/landing/images/example.jpg') }}" alt="example">
				</div>
				<div class="card-body">
					<h5>Lorem ipsum dolor sit amet, consectetur adipisicing.</h5>
					<p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Eaque commodi praesentium voluptatibus?</p>
				</div>
				<div class="card-footer row">
					<p>Studioku</p>
					<p>2 hari yang lalu</p>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card-style">
				<div class="card-img">
					<img src="{{ asset('/assets/landing/images/example.jpg') }}" alt="example">
				</div>
				<div class="card-body">
					<h5>Lorem ipsum dolor sit amet consectetur adipisicing.</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste enim rem cum?</p>
				</div>
				<div class="card-footer row">
					<p>Studioku</p>
					<p>2 hari yang lalu</p>
				</div>
			</div>
		</div>
	</div>
</section>
{{-- -------------- end blogs ------------------------- --}}




@endsection