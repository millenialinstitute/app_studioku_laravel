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
				<tr>
					<td>1</td>
					<td class="text-left">background</td>
					<td>0</td>
					<td class="action">
						<div>
							<button class="btn-icon bg-danger">
								<img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="delete" class="img">
							</button>
						</div>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td class="text-left">background</td>
					<td>0</td>
					<td class="action">
						<div>
							<button class="btn-icon bg-danger">
								<img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="delete" class="img">
							</button>
						</div>
						</td>
				</tr>
				<tr>
					<td>3</td>
					<td class="text-left">background</td>
					<td>0</td>
					<td class="action">
						<div>
							<button class="btn-icon bg-danger">
								<img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="delete" class="img">
							</button>
						</div>
						</td>
				</tr>
				<tr>
					<td>4</td>
					<td class="text-left">background</td>
					<td>0</td>
					<td class="action">
						<div>
							<button class="btn-icon bg-danger">
								<img src="{{ asset('/assets/dashboard/icons/delete_icon_white.svg') }}" alt="delete" class="img">
							</button>
						</div>
						</td>
				</tr>

			</tbody>
		</table>
	</div>
	<div class="col">
		<h3 class="title-section">Buat Kategori</h3>
		<form action="" class="card-form">
			<input type="text" name="category" class="form-control" placeholder="Nama Kategori">
			<button class="mt-2 ml-1">Tambah</button>
		</form>
	</div>
</div>

@endsection
	