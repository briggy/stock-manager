@extends('admin')

@section('pt') Add New Sale @stop

@section('js')
@parent
@include('sales.js')
@stop

@section('c')
	
	<div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-align-left"></i>
              <h3>Please enter the information below </h3>
            </div>

            <div class="widget-content">
            {{ Form::open(['class'=>'form-horizontal', 'route'=>'sales.store']) }}
           
           <div class="row">  
                <fieldset class="col-lg-6">
                  
                  <div class="control-group">
                  	{{ Form::label('date', 'Date', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::input('date','date', Input::old('date', date('Y-m-d')), ['class'=>'form-control', 'required', 'autofocus']) }}
                    </div>
                  </div>

                  {{ Form::hidden('type', 'sales') }}

                </fieldset>

            </div>   

<div class="row">
                <fieldset class="col-lg-12" >
                	
               	 <div class="control-group">
                  	{{ Form::label('items', 'Inventory Items', ['class'=>'control-label']) }}

                    <div class="controls form-group">
                    <div class="input-group"> 

                    	<span class="input-group-addon"><i class="icon-search"></i></span>
					    {{ Form::text('', null, ['class'=>'form-control search-product', 'placeholder'=>'Product Name']) }}


                    </div>
                  </div>
                </div>

                <div class="control-group">
                <div class="controls form-group">
                		<table class="table table-bordered table-striped ">
                      		<thead>
                      		<tr>
                      			<th>Product Name (Product Code)</th>
                      			<th>Quantity</th>
                      			<th>Unit Price</th>
                      			<th><i class="icon-trash"></i></th>
                      		</tr>
                      		</thead>

                      		<tbody>
                      			
                      			                      			

                      		</tbody>
                      	</table>
                </div>
                </div>
                </fieldset>
       </div>

                <div class="form-actions">
                  <div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a href="{{ route('sales.index') }}" class="btn btn-default" type="button">Cancel</a>
                  </div>
                </div>

                {{ Form::close() }}

             </div>
             </div>
             </div>
             </div>
@stop