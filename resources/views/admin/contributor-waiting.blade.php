@extends('layouts.admin')

@section('title' , 'Semua Kontributor')
@section('contributor' , 'active')
@section('body')

{{-- thumbnail --}}
<div class="row">
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/contributor_illustration.svg') }}" alt="contributor">
			<div class="content">
				<h4 class="value">2</h4>
				<p class="description">Kontributor</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/waiting_illustration.svg') }}" alt="waiting">
			<div class="content">
				<h4 class="value">2</h4>
				<p class="description">Menunggu Persetujuan</p>
			</div>
		</div>
	</div>
</div>

<h3 class="title-section">Kontributor Teratas</h3>	

<div class="card-item">
	<p class="number">1</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>
<div class="card-item">
	<p class="number">2</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>
<div class="card-item">
	<p class="number">3</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>
<div class="card-item">
	<p class="number">4</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>
<div class="card-item">
	<p class="number">5</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>


<h3 class="title-section">Kontributor Menunggu</h3>	

<div class="card-item">
	<p class="number">1</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>
<div class="card-item">
	<p class="number">2</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>
<div class="card-item">
	<p class="number">3</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>
<div class="card-item">
	<p class="number">4</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>
<div class="card-item">
	<p class="number">5</p>
	<div class="profile"></div>
	<div class="content">
		<h4 class="title">Atika Mahmudah</h4>
		<div class="data row">
			<span>200 Konten</span>
			<span>200 Terjual</span>
		</div>
	</div>
	<div class="total">
		<p>Total Pendapatan</p>
		<div class="value">Rp.20.000.000</div>
	</div>
</div>

@endsection