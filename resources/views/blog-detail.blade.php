@extends('layouts.landing')
@section('title'  , 'Blog')
@section('body')

<div class="blog">
	<div class="heading-blog mt-5">
		<h1>{{ $blog->title }}</h1>
		<div class="meta-blog">
			<span>Oleh Studioku</span>
			<span>10 Komentar</span>
			<span>{{ $blog->created_at->diffForHumans() }}</span>
		</div>
	</div>

	<div class="thumbnail my-5">
		<img src=" {{ asset('storage/blogs/' . $blog->thumbnail) }} " alt="photos" class="img">
	</div>

	<div class="blog-body">
		{!! $blog->content !!}
	</div>
</div>

<hr>


<div class="relate-blog">
	<section class="blogs mx-5">
	<h2>Blog Terkait</h2>
	<div class="row">
		@forelse($blogs as $blog)
			<div class="col">
				<a href=" {{ url('/blog/detail/' . $blog->id) }} " style="display: block;background: white" class="card-style">
					<div class="card-img">
						<img src="{{ asset('storage/blogs/' . $blog->thumbnail) }}" alt="example">
					</div>
					<div class="card-body">
						<h5>{{ $blog->title }}</h5>
					</div>
					<div class="card-footer row">
						<p>Studioku</p>
						<p class="text-right">{{ $blog->created_at->diffForHumans() }}</p>
					</div>
				</a>
			</div>
		@empty
			<h2>Tidak ada blog</h2>
		@endforelse
	</div>
</section>
</div>

@endsection
	