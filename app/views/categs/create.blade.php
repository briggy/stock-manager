@extends('admin')

@section('pt') Add Category @stop

@section('c')
	
	<div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-align-left"></i>
              <h3>Please enter the  information below </h3>
            </div>

            <div class="widget-content">
            {{ Form::open(array('class'=>'form-horizontal', 'route'=>'categs.store', 'files'=>true)) }}
                <fieldset class="col-lg-6">
                  
                  <div class="control-group">
                  	{{ Form::label('code', 'Category Code', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('code', Input::old('code'), ['class'=>'form-control', 'required', 'autofocus']) }}
                    </div>
                  </div>

                  <div class="control-group">
                  	{{ Form::label('name', 'Category Name', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::text('name', Input::old('name'), ['class'=>'form-control', 'required']) }}
                    </div>
                  </div>

                  <div class="control-group">
                  	{{ Form::label('parent_id', 'Parent Category', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::select('parent_id', Categ::getParentList() ,Input::old('parent_id'), ['class'=>'form-control']) }}
                    </div>
                  </div>

                </fieldset>
                <div class="form-actions">
                  <div>
                    <button class="btn btn-primary" type="submit">Add Category</button>
                    <a href="{{ route('categs.index') }}" class="btn btn-default" type="button">Cancel</a>
                  </div>
                </div>

                {{ Form::close() }}

             </div>
             </div>
             </div>
             </div>
@stop