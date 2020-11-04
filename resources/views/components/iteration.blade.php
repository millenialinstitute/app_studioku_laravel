@php
	if(collect($_GET)->count()) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$page = (int)$page;
@endphp
{{ $loop->iteration + $paginate *($page -1) }}
