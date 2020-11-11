@extends('layouts.admin')
@section('title'  , 'Daftar blog')
@section('blog' , 'active')
@section('body')

<h3 class="title-section">Daftar Blog</h3>

@forelse($blogs as $blog)
	<div class="card-item">
		<div class="row" style="align-items: center;width: 70%;justify-content: flex-start;">
			<p class="number">@include('components.iteration' , ['paginate' => 5])</p>
			<div class="preview">
				<img src="{{ asset('storage/blogs/' . $blog->thumbnail) }}" alt="" class="img" style="max-height: 80px">
			</div>
			<div class="content ml-2">
				<h4 class="title">{{ $blog->title }}</h4>
				<div class="data">
					<span>{{ $blog->created_at->diffForHumans() }}</span>
				</div>
			</div>
		</div>
		<div class="action">
			<a href="{{ url('blog/detail/' . $blog->id) }}" target="_blank" class="btn-icon bg-warn">
				<img src="{{ asset('/assets/dashboard/icons/detail_icon.svg') }}" alt="detail">
			</a>
			<form action="{{ url('admin/blog/destroy/' . $blog->id) }}" method="post" style="display: inline-block;">
				@csrf
				@method('delete')
				<button class="btn-icon bg-danger">
					<img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="detail">
				</button>
			</form>
		</div>
	</div>
@empty
	<h2>Tidak ada blog</h2>
@endforelse
	

	{{ $blogs->links() }}

@endsection
	