@extends('admin')

@section('pt')  Purchases <small>Please use the table below to navigate or filter the results.</small>  @stop

@section('c')
	
	<div class="row">
		

        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header">
             
              <i class="icon-tasks"></i><h3>List Purchases</h3>
            </div>
            <div class="widget-content">

            		<div class="body">
            		
                <table class="table table-striped  datatable">
                  <thead>
                    <tr>
                      <th >ID</th>
                      <th class="">Date</th>
                      <th class="">Supplier</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($pos as $i=>$p)
                    <tr>
                      <td class="">{{ $p->id }}</td>
                      <td class="">{{ $p->date }}</td>
                      <td>{{ $p->supplier->company }}</td>
                      <td>{{ number_format($p->total_cost,2) }}</td>
                      <td>

                      {{ Form::open(['route'=>['purchases.destroy', $p->id], 'method'=>'DELETE', 'class'=>'destroy']) }}

                      	<a href="{{ route('purchases.edit', $p->id) }}" class="btn btn-sm btn-primary"> Edit </a>
                        <button class="btn btn-sm btn-warning"> Delete </button>

                      {{ Form::close() }}

                      </td>
                    </tr>	
                   @endforeach


                    
                  </tbody>
                	
                  <tfoot>
                  		
                  	<tr>
                  		
                  		<td>[ID]</td>
                  		<td>[Date (yyyy-mm-dd)]</td>
                  		<td>[Supplier]</td>
                  		<td> <b>{{ number_format(Inventory::purchases()->sum('total_cost'),2) }}</b> </td>
                  		<td></td>

                  	</tr>

                  </tfoot>

                </table>
              
              	<a href="{{ route('purchases.create') }}" class="btn btn-primary"> <i class="icon-plus"></i> Add Purchase</a>

            		</div>

            </div>
          </div>
        </div>
      

	</div>

@stop