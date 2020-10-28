@extends('layouts.admin')
@section('title'  , 'Kategori Item')
@section('item' , 'active')
@section('body')

<div class="row">
	<div class="col-2">
		<h3 class="title-section">Daftar Kategori Item</h3>
		<table class="list-category">
			<thead>
				<tr>
					<th>#</th>
					<th>Kategori</th>
					<th>Item</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody>
				@forelse($categories as $category)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td class="text-left">{{ $category->name }}</td>
						<td>0</td>
						<td class="action">
							<div>
								<form action="{{ url('admin/item/category/' . $category->id . '/delete') }}" method="post">
									@csrf
									@method('delete')
									<button class="btn-icon bg-danger">
										<img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="delete" class="img">
									</button>
								</form>
							</div>
						</td>
					</tr>
				@empty	
					<h1>Tidak ada data</h1>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="col">
		<h3 class="title-section">Buat Kategori</h3>
		<form action="{{ url('/admin/item/category') }}" method="post" class="card-form">
			@csrf
			<input type="text" name="name" class="form-control" placeholder="Nama Kategori">
			<button class="mt-2 ml-1">Tambah</button>
		</form>
	</div>
</div>

@endsection
	