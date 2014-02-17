@extends('web')

@section('content')
	
	<div class="row">
		
{{ Form::open(['class'=>'form-horizontal', 'url'=>'web/final-checkout', 'method'=>'put']) }}

	<div class="span7"> <h3>Summary</h3> @include('web.cart')</div>


<div class="span4 offset1">
  
  <h3>Customer Details</h3>

  <div class="control-group">
    {{ Form::label('fullname', 'Fullname', ['class'=>'control-label']) }}
    <div class="controls">
      {{ Form::text('fullname', Input::old('fullname'), ['required'=>'']) }}
    </div>
  </div>

  <div class="control-group">
    {{ Form::label('email', 'Email', ['class'=>'control-label']) }}
    <div class="controls">
      {{ Form::email('email', Input::old('email'), ['required'=>'']) }}
    </div>
  </div>

  <div class="control-group">
    {{ Form::label('contact', 'Contact #', ['class'=>'control-label']) }}
    <div class="controls">
      {{ Form::text('contact', Input::old('contact'), ['required'=>'']) }}
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
     
      <button type="submit" class="btn btn-large btn-success">Buy Now!</button>
    </div>
  </div>


</div>

{{ Form::close() }}


	</div>

@stop