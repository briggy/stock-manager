@extends('admin')

@section('pt')  Products <small>Please use the table below to navigate or filter the results.</small>  @stop

@section('c')
	
	 <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header">
             
              <i class="icon-tasks"></i><h3>List of Products</h3>
            </div>
            <div class="widget-content">

            		<div class="body">
            		
                <table class="table table-striped table-images datatable">
                  <thead>
                    <tr>
                      <th class="hidden-xs-portrait">Product Code</th>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th class="hidden-xs">Category</th>
                      <th class="hidden-xs">Product Cost</th>
                      <th class="hidden-xs">Product Price</th>
                      <th class="hidden-xs">Quantity</th>
                      <th class="hidden-xs">Alert Quantity</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($prds as $p)
                    <tr>
                      <td class="hidden-xs-portrait">{{ $p->code }}</td>
                      <td><img src="{{ $p->img() }}" /></td>
                      <td>{{ $p->name }}</td>
                      <td class="hidden-xs">{{ $p->categ->name }}</td>
                      <td class="hidden-xs">{{ number_format($p->cost, 2) }}</td>
                      <td class="hidden-xs">{{ number_format($p->price, 2) }}</td>
                      <td class="hidden-xs">{{ $p->qty() }}</td>
                      <td class="hidden-xs">{{ $p->alert_qty }}</td>
                      <td>

                      {{ Form::open(array('route'=>array('products.destroy', $p->id), 'method'=>'DELETE', 'class'=>'destroy')) }}

                      	<a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-primary"> Edit </a>
                        <button class="btn btn-sm btn-warning"> Delete </button>

                      {{ Form::close() }}

                      </td>
                    </tr>	
                   @endforeach


                    
                  </tbody>
                </table>
              
              	<a href="{{ route('products.create') }}" class="btn btn-primary"> <i class="icon-plus"></i> Add Product</a>

            		</div>

            </div>
          </div>
        </div>
      </div>

@stop