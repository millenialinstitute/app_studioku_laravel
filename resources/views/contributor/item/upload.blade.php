@extends('layouts.contributor')
@section('title'  , 'Upload Item')
@section('item' , 'active')
@section('body')

<div class="row upload-banner">
	<div class="col">
		<img src="{{ asset('/assets/dashboard/illustration/contributor/find_illustration.svg') }}" alt="find illustration">
	</div>
	<div class="col-2">
		<h2>Kami mencari desain terbaik!</h2>
		<p>Untuk menjadi kontributor kamu harus  mengunggah 20 desai pertama. Tim kami akan mengevaluasi kualitas desain berdasarkan ketentuan kami. Desainmu akan ditinjau dalam 5 hari. Kami akan mengirimkan notifikasi apabila desainmu telah ditinjau.</p>
	</div>
</div>


<div class="row">
	<div class="col">
		<div class="upload-card">
			<h3>Vektor </h3>
			<ul>
				<li>Unggah file vektor dengan format Eps dan file pratinjau jpg maksimal 80Mb</li>
				<li>Gunakan warna RGB</li>
				<li>File pratinjau harus berukuran antara 2.000px dan 8.000px</li>
			</ul>
		</div>
	</div>
	<div class="col">
		<div class="upload-card">
			<h3>Vektor </h3>
			<ul>
				<li>Unggah file vektor dengan format Eps dan file pratinjau jpg maksimal 80Mb</li>
				<li>Gunakan warna RGB</li>
				<li>File pratinjau harus berukuran antara 2.000px dan 8.000px</li>
			</ul>
		</div>
	</div>
	<div class="col">
		<div class="upload-card">
			<h3>Vektor</h3>
			<ul>
				<li>Unggah file vektor dengan format Eps dan file pratinjau jpg maksimal 80Mb</li>
				<li>Gunakan warna RGB</li>
				<li>File pratinjau harus berukuran antara 2.000px dan 8.000px</li>
			</ul>
		</div>
	</div>
</div>




{{-- form upload --}}
<form action="{{ url('/contributor/item/upload') }}" enctype="multipart/form-data" method="post">
	@csrf
	<h3 class="title-section">Upload</h3>
	<div class="file card-item">
		<div class="form-group">
			<label for="preview">Preview </label>
			<input type="file" id="preview" name="preview" class="form-control ">
		</div>
		<div class="form-group">
			<label for="itemFile">File Item </label>
			<input type="file" id="itemFile" name="itemFile" class="form-control ">
		</div>
		
	</div>

	<div class="row card-item data-item ">
		<div class="col">
			<div class="form-group">
				<label for="title">Judul </label>
				<input type="text" id="title" name="title" class="form-control ">
			</div>
			<div class="form-group">
				<label for="tag">Tag </label>
				<input type="text" id="tag" name="tag" class="form-control ">
			</div>
		</div>		
		<div class="col">
			<div class="form-group">
				<label for="cost">Harga </label>
				<input type="number" id="cost" name="cost" class="form-control ">
			</div>
			<div class="form-group">
				<label for="category">Kategori </label>
				<select name="category" id="category">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			<div class=" text-right">
				<button>Simpan</button>
			</div>
		</div>		
	</div>
</form>



@endsection
	