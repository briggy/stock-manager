@extends('admin')

@section('pt') Add Product @stop

@section('c')
	
	<div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-align-left"></i>
              <h3>Please enter the product information below </h3>
            </div>

            <div class="widget-content">

            {{ Form::open(['class'=>'form-horizontal', 'route'=>'products.store', 'files'=>true]) }}
                <fieldset class="col-lg-6">
                  
                  <div class="control-group">
                  	{{ Form::label('code', 'Product Code', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('code', Input::old('code'), ['class'=>'form-control', 'required', 'autofocus']) }}
                    </div>
                  </div>

                  <div class="control-group">
                  	{{ Form::label('name', 'Product Name', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('name', Input::old('name'), ['class'=>'form-control', 'required']) }}
                    </div>
                  </div>

                  <div class="control-group">
                  	{{ Form::label('categ_id', 'Category', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::select('categ_id', Categ::getList() ,Input::old('categ_id'), ['class'=>'form-control', 'required']) }}
                    </div>
                  </div>

                  <div class="control-group">
                  	{{ Form::label('cost', 'Product Cost', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('cost', Input::old('cost'), ['class'=>'form-control', 'required',  'pattern'=>'\d*.\d*', 'placeholder'=>'0.00']) }}
                    </div>
                  </div>

                  <div class="control-group">
                  	{{ Form::label('price', 'Product Price', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('price', Input::old('price'), ['class'=>'form-control', 'required', 'pattern'=>'\d*.\d*', 'placeholder'=>'0.00']) }}
                    </div>
                  </div>

                  <div class="control-group">
                  	{{ Form::label('alert_qty', 'Alert Quantity', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('alert_qty', Input::old('alert_qty'), ['class'=>'form-control', 'required', 'pattern'=>'\d*']) }}
                    </div>
                  </div>

                  <div class="control-group">
                  	{{ Form::label('file', 'Product Image', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::file('file', ['class'=>'form-control']) }}
                    </div>
                  </div>

                </fieldset>
                <div class="form-actions">
                  <div>
                    <button class="btn btn-primary" type="submit">Add Product</button>
                    <a href="{{ route('products.index') }}" class="btn btn-default" type="button">Cancel</a>
                  </div>
                </div>

                {{ Form::close() }}

             </div>
             </div>
             </div>
             </div>
@stop