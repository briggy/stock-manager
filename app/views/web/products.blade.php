@extends('web')

@section('content')
	
	<div class="row ">
		

		<div class="span3">
			<h4>Categories</h4>

			<ul class="nav nav-list well">
			  <li><a href="{{ url('web/products') }}"> <i class="icon-list"></i> All Categories</a></li>
			@foreach($categs as $cat)
			  <li class="nav-header">{{ $cat->name }}</li>
			  @foreach($cat->subs as $sub_cat)
			  	<li><a href="{{ url('web/products/'.$sub_cat->id) }}"> <i class="icon-chevron-right"></i> {{ $sub_cat->name }} <span class="badge badge-info pull-right">{{ count($sub_cat->products) }}</span></a> </li>
			  @endforeach
			@endforeach
			</ul>
		</div>
		<div class="span9">
			
				@include('web.product.list')


		</div>

	</div>

@stop