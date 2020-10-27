@extends('layouts.admin')
@section('title' , 'Daftar Member')
@section('member' , 'active')
@section('body')



	<h3 class="title-section">Daftar Member</h3>

	@foreach($members as $member)
		<div class="card-list">
			<div class="row" style="align-items: center;width: 50%;justify-content: flex-start;">
				<p class="number">1</p>
				<div class="profile mr-2">
					<img src="{{ asset('/storage/users/user.jpg') }}" alt="user">
				</div>
				<div class="content">
					<h4 class="name">Atika Mahmudah</h4>
					<div class="data">
						<span>200 download</span>
						<span>5 suka</span>
						<span>5 koleksi</span>
					</div>
				</div>
			</div>
			<div class="join">
				<p>Member sejak</p>
				<p>18/10/2020</p>
			</div>
			<div class="action">
				<a href="{{ url('admin/member/' . $member->id) }}" class="btn-icon bg-warn">
					<img src="{{ asset('/assets/dashboard/icons/detail_icon.svg') }}" alt="detail">
				</a>
			</div>
		</div>	
	@endforeach

@endsection