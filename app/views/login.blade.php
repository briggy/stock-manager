@extends('master')

@section('body')

	
<div class="login-logo">
	<img src="{{ asset('') }}/images/logo.png" style="width:100%;" /> 
    </div>

<div class="widget">
<div class="login-content">
  <div class="widget-content" style="padding-bottom:0;">

  @include('alerts')

  {{ Form::open(array('url'=>'auth/check','class'=>'no-margin')) }}

                <h3 class="form-title">Login to your account</h3>
                
                <fieldset>
                    <div class="form-group no-margin">
                    	{{ Form::label('username', 'Username') }}

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                            {{ Form::text('username', Input::old('username'), array('placeholder'=>'Username', 'class'=>'form-control input-lg')) }}
                        </div>

                    </div>

                    <div class="form-group">
                    	{{ Form::label('password', 'Password') }}

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="icon-lock"></i>
                                </span>
                            {{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control input-lg')) }}
                        </div>

                    </div>
                </fieldset>
               <div class="form-actions">
				<label class="checkbox"></label>

        <!-- <a href="{{ url('web') }}" class="pull-right btn btn-primary" style="margin:0 5px;">Return to Site</a> -->


				<button class="btn btn-warning pull-right" type="submit">
				Login <i class="m-icon-swapright m-icon-white"></i>
				</button> 

			</div>
            
            
		{{ Form::close() }}  
  
  </div>
   </div>
</div>









@stop