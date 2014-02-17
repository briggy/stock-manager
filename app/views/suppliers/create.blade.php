@extends('admin')

@section('pt') New Supplier @stop

@section('c')
	
	<div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-align-left"></i>
              <h3>Please enter the information below </h3>
            </div>

            <div class="widget-content">
            {{ Form::open(['class'=>'form-horizontal', 'route'=>'suppliers.store', 'files'=>true]) }}
                <fieldset class="col-lg-6">
                  
                 

                  <div class="control-group">
                  	{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('name', Input::old('name'), ['class'=>'form-control', 'required']) }}
                    </div>
                  </div>

				   <div class="control-group">
                  	{{ Form::label('email', 'Email', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::email('email', Input::old('email'), ['class'=>'form-control', 'required']) }}
                    </div>
                  </div>

                   <div class="control-group">
                  	{{ Form::label('phone', 'Phone', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('phone', Input::old('phone'), ['class'=>'form-control', 'required', 'pattern'=>'[0-9]{7,15}']) }}
                    </div>
                  </div>    

                  <div class="control-group">
                  	{{ Form::label('company', 'Company', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('company', Input::old('company'), ['class'=>'form-control', 'required', 'pattern'=>'.{1,55}']) }}
                    </div>
                  </div>  


                   <div class="control-group">
                  	{{ Form::label('address', 'Address', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('address', Input::old('address'), ['class'=>'form-control', 'required', 'pattern'=>'.{2,255}']) }}
                    </div>
                  </div>       

                  <div class="control-group">
                  	{{ Form::label('city', 'City', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('city', Input::old('city'), ['class'=>'form-control', 'required', 'pattern'=>'.{2,255}']) }}
                    </div>
                  </div>  

                </fieldset>
                <div class="form-actions">
                  <div>
                    <button class="btn btn-primary" type="submit">Add Supplier</button>
                    <a href="{{ route('suppliers.index') }}" class="btn btn-default" type="button">Cancel</a>
                  </div>
                </div>

                {{ Form::close() }}

             </div>
             </div>
             </div>
             </div>
@stop