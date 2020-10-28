@extends('layouts.contributor')
@section('title' , 'Dashboard')
@section('dashboard' , 'active')
@section('body')

	<div style="
		background: rgb(96, 182, 251);
	    color: white;
	    font-size: 25px;
	    padding: 20px;
	    text-align: left;
	    border-radius: 10px;
	" >
		Selamat Datang , Atika
	</div>


{{-- thumbnail --}}
<div class="row">
	<div class="col">
		@include('subview.card-thumb' , [
				'img' => 'collection_illustration.svg',
				'value' => '2',
				'caption' => 'Total Item',
			])
	</div>
	<div class="col">
		@include('subview.card-thumb' , [
				'img' => 'sold_illustration.svg',
				'value' => '2',
				'caption' => 'Total Terjual',
			])
	</div>
	<div class="col">
		@include('subview.card-thumb' , [
				'img' => 'earning_illustration.svg',
				'value' => '2',
				'caption' => 'Total Saldo',
			])
	</div>
</div>	





{{-- file and statistic --}}
<div class="row">
	<div class="col">
		<h3 class="title-section">File</h3>
		<div class="card-file" >
			<div class="row">
				<div class="item" style="background: url('{{ asset('assets/dashboard/illustration/contributor/bg-file-blue.svg') }}'); background-size: cover;" >
					<h4>10</h4>
					<p>Belum Terkirim</p>
				</div>
				<div class="item" style="background: url('{{ asset('assets/dashboard/illustration/contributor/bg-file-green.svg') }}'); background-size: cover;">
					<h4>10</h4>
					<p>Menunggu Persetujuan</p>
				</div>
			</div>
			<div class="row">
				<div class="item" style="background: url('{{ asset('assets/dashboard/illustration/contributor/bg-file-red.svg') }}'); background-size: cover;">
					<h4>10</h4>
					<p>Ditolak</p>
				</div>
				<div class="item" style="background: url('{{ asset('assets/dashboard/illustration/contributor/bg-file-orange.svg') }}'); background-size: cover;">
					<h4>10</h4>
					<p>Diterima</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col">
		<h3 class="title-section">Statistik Penjualan</h3>
	</div>
</div>


{{-- sales --}}
<div class="row">
	<div class="col">
		<h3 class="title-section">Penjualan Teratas</h3>
		<div class="card-item">
			<p class="number">1</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
		<div class="card-item">
			<p class="number">2</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
		<div class="card-item">
			<p class="number">3</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
		<div class="card-item">
			<p class="number">4</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
		<div class="card-item">
			<p class="number">5</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
	</div>
	<div class="col">
		<h3 class="title-section">Penjualan Terakhir</h3>
		<div class="card-item">
			<p class="number">1</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
		<div class="card-item">
			<p class="number">2</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
		<div class="card-item">
			<p class="number">3</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
		<div class="card-item">
			<p class="number">4</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
		<div class="card-item">
			<p class="number">5</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Flat Illustration</h4>
				<p>10 Terjual</p>
			</div>
		</div>
	</div>
</div>



@endsection