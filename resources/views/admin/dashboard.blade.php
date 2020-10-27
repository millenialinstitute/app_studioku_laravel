@extends('layouts.admin')
@section('title' , 'Dashboard Admin')
@section('dashboard' , 'active')
@section('body')

{{-- thumbnail --}}
<div class="row">
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/contributor_illustration.svg') }}" alt="contributor">
			<div class="content">
				<h4 class="value">{{ $contributors }}</h4>
				<p class="description">Kontributor</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/admin/member_illustration.svg') }}" alt="member">
			<div class="content">
				<h4 class="value">{{ $members }}</h4>
				<p class="description">Member</p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="row card-thumb">
			<img src="{{ asset('/assets/dashboard/illustration/collection_illustration.svg') }}" alt="collection">
			<div class="content">
				<h4 class="value"> {{ $itemsCount }} </h4>
				<p class="description">Item</p>
			</div>
		</div>
	</div>
</div>



{{-- Data kontributor --}}
<div class="row">
	<div class="col">
		<h3 class="title-section">Kontributor Teratas</h3>	
		<div class="card-item">
			<p class="number">1</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-item">
			<p class="number">2</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-item">
			<p class="number">3</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-item">
			<p class="number">4</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-item">
			<p class="number">5</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col">
		<h3 class="title-section">Penjualan Teratas</h3>
		<div class="card-item">
			<p class="number">1</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-item">
			<p class="number">2</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-item">
			<p class="number">3</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-item">
			<p class="number">4</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card-item">
			<p class="number">5</p>
			<div class="preview"></div>
			<div class="content">
				<h4 class="title">Atika Mahmudah</h4>
				<div class="data row">
					<div class="item">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/item_icon.svg') }}" alt="item">
						<span>100</span>
					</div>
					<div class="cart">
						<img src="{{ asset('/assets/dashboard/sidebar-icon/cart_icon.svg') }}" alt="cart">
						<span>100</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection