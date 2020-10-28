@extends('layouts.admin')
@section('title'  , 'Detail Item')
@section('item' , 'active')
@section('body')

<h3 class="title-section">Detail Item</h3>

<div class="item-detail">
	<div class="row">
		<div class="col">
			<div class="preview">
				<img src=" {{ asset('storage/photos/example.jpg') }} " alt="example" class="img">
			</div>
			<a href="" class="btn-download">download file</a>
		</div>
		<div class="col-2">
			<form action="">
				@csrf
				<div class="item-data">
					<p class="label">Judul</p>
					<p class="value">Flat Illustration</p>
				</div>
				<div class="item-data">
					<p class="label">Kategori</p>
					<p class="value">Background</p>
				</div>
				<div class="item-data">
					<p class="label">Tag</p>
					<p class="value">logo</p>
				</div>
				<div class="item-data">
					<p class="label">Harga</p>
					<p class="value">Rp.200.000,00</p>
				</div>
			</form>
		</div>
	</div>
	<div class="text-right mt-3">
		<a href="" class="btn-accept">Diterima</a>
		<button class="btn-reject">Ditolak</button>
	</div>
</div>


<div class="modal" id="modalReject" >
	<div class="modal-header text-center">
		<h2>Pilih Alasan Penolakan</h2>
	</div>
	<div class="modal-body">
		<ul>
			<li><input type="checkbox" value="data1"> Format file salah</li>
			<li><input type="checkbox" value="data1"> Format file salah</li>
			<li><input type="checkbox" value="data1"> Format file salah</li>
			<li><input type="checkbox" value="data1"> Format file salah</li>
			<li><input type="checkbox" value="data1"> Format file salah</li>
		</ul>
	</div>
</div>	


@endsection
	