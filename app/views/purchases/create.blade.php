@extends('admin')

@section('pt') Purchase Order @stop

@section('js')
@parent
@include('purchases.js')
@stop

@section('c')
	
	<div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-align-left"></i>
              <h3>Please enter the information below </h3>
            </div>

            <div class="widget-content">
            {{ Form::open(['class'=>'form-horizontal', 'route'=>'purchases.store']) }}
           
           <div class="row">  
                <fieldset class="col-lg-6">
                  
                  <div class="control-group">
                  	{{ Form::label('date', 'Date', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::input('date','date', Input::old('date', date('Y-m-d')), ['class'=>'form-control', 'required', 'autofocus']) }}
                    </div>
                  </div>

                  <div class="control-group">
                  	{{ Form::label('supplier_id', 'Supplier', ['class'=>'control-label']) }}
                    <div class="controls form-group">
                      {{ Form::select('supplier_id', Supplier::lists('company','id'), Input::old('supplier_id'), ['class'=>'form-control', 'required']) }}
                    </div>
                  </div>

                  {{ Form::hidden('type', 'purchase') }}

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
                      			<th>Unit Cost</th>
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
                    <a href="{{ route('purchases.index') }}" class="btn btn-default" type="button">Cancel</a>
                  </div>
                </div>

                {{ Form::close() }}

             </div>
             </div>
             </div>
             </div>
@stop