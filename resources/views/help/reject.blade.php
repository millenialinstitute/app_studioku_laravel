@extends('layouts.help')
@section('title'  , 'Alasan Penolakan')
@section('body')

<div class="row help-reject mt-4">
	<div class="col">
		<div class="list-item">
			<h3 class="title-section">Alasan Penolakan</h3>
			<ul>
				@forelse($reasons as $reason)
					<li>
						<a href="">{{ $loop->iteration }}. {{ substr($reason->title, 0,20 ) . ' . . .' }}</a>
					</li>
				@empty
					<li>Tidak ada data</li>
				@endforelse
			</ul>
		</div>
	</div>
	<div class="col-3">
		<div class="mt-2 list-reason">
			@forelse($reasons as $reason)
				<div class="reject-item mb-2">
					<h4>{{ $loop->iteration }}. {{ $reason->title }}</h4>
					<p>{{ $reason->description }}</p>
				</div>
			@empty
				<h3>Tidak ada data</h3>
			@endforelse
		</div>
	</div>
</div>

@endsection
	