@if(Session::has('alert'))
	
	@foreach(Session::get('alert') as $st=>$alert)
		<div class="alert alert-{{ $st }}">
			<i class="icon {{ $alert['icon'] }}"></i>
			<button type="button" class="close" data-dismiss="alert">×</button>
			{{ $alert['text'] }}
		</div>
	@endforeach
		
@endif