<nav>
	<ul class="pagination">
		@php
			$currentPage = (int)$_GET['page'];
			$lastPage = count($pagination->toArray());
		@endphp
		@if($currentPage !== 1)
			<li class="page-item">
				<a href="{{ url('admin/sales/?page=' . ($currentPage-1)) }}" class="page-link"><</a>
			</li>
		@endif
		@foreach($pagination as $page)
		<li class="page-item @if($currentPage == $page['text']) active @endif ">
			<a href="{{ $page['link'] }}" class="page-link">{{ $page['text'] }}</a>
		</li>
		@endforeach
		@if($currentPage !== $lastPage)
		<li class="page-item">
			<a href="{{ url('admin/sales/?page=' . ($currentPage+1)) }}" class="page-link">></a>
		</li>
		@endif
	</ul>
</nav>