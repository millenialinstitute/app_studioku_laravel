@extends('layouts.help')
@section('title'  , 'Cara Upload')
@section('body')

<div class="container upload">
	<div class="row">
		<div class="col">
			<h3 class="title-section">Kontributor Baru</h3>
			<p class="card">Jika Anda kontributor baru , Anda harus mengirimkan 20 item pertama untuk dievaluasi. Tim kami akan mengevaluasi kualitas item sesuai ketentuan kami. Item Anda akan ditinjau dalam 5 hari. Kami akan mengirimkan pemberitahuan di email atau di dashboard kontributor apabila item Anda telah ditinjau.</p>
		</div>
		<div class="col">
			<h3 class="title-section">Kontributor Resmi</h3>
			<p class="card">Jika 20 item Anda ditermia, Anda secara resmi menjadi kontributor. Setelah menjadi kontributor resmi. Anda bisa mengupload item tanpa batasan jumlah. Namun, item yang Anda kirimkan tetap akan dievaluasi oleh tim kami untuk menjaga kualitas item. Selamat berharya!!</p>
		</div>
	</div>
	<div class="upload-progress">
		<h3 class="title-section">Upload File Eps</h3>
		<div class="upload-step">
			<div class="illustration"></div>
			<p>Ketika upload item pastikan ukuran file tidak melebihi batas maksimal yaitu 80MB untuk format eps dan maksimal 200MB untuk PSD</p>
		</div>
		<div class="upload-step">
			<div class="illustration"></div>
			<p>Step berikutnya edit judul , tag , kategori dan harga masing-masing item. Pastikan tag dan kategori yang dipilih sesuai dengan tema item yang Anda upload agar item Anda tidak ditolak. File yang sudah siap diupload ditandai dengan icon checklist.</p>
		</div>
		<div class="upload-step">
			<div class="illustration"></div>
			<p>Setelah item dikirim, item masuk dalam daftar menunggu persetujuan. Item akan direview dalam 5 hari. Kami akan mengirim notifikasi apabila item Anda telah direview</p>
		</div>
		<div class="upload-step">
			<div class="illustration"></div>
			<p>Apabila item Anda ditolak , lihat daftar item ditolak disana ada alasan mengapa item Anda ditolak. Jika masih bisa direvisi, revisi item kemudian upload ulang.</p>
		</div>
		<div class="upload-step">
			<div class="illustration"></div>
			<p>Jika item Anda masuk daftar diterima , selamat item Anda akan dipublikasikan dan dijual di Studioku.</p>
		</div>
	</div>
</div>

@endsection
		