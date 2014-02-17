@extends('admin')

@section('pt')  Sales <small>Please use the table below to navigate or filter the results.</small>  @stop

@section('c')
	
	<div class="row">

        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header">
             
              <i class="icon-tasks"></i><h3>List Sales</h3>
            </div>
            <div class="widget-content">

            		<div class="body">
            		
                <table class="table table-striped  datatable">
                  <thead>
                    <tr>
                      <th >ID</th>
                      <th class="">Date</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($sales as $i=>$s)
                    <tr>
                      <td class="">{{ $s->id }}</td>
                      <td class="">{{ $s->date }}</td>
                      <td>{{ number_format($s->total_cost,2) }}</td>
                      <td>

                      {{ Form::open(['route'=>['sales.destroy', $s->id], 'method'=>'DELETE', 'class'=>'destroy']) }}

                      	<a href="{{ route('sales.edit', $s->id) }}" class="btn btn-sm btn-primary"> Edit </a>
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
                  		<td> <b>{{ number_format(Inventory::sales()->sum('total_cost'),2) }}</b> </td>
                  		<td></td>

                  	</tr>

                  </tfoot>

                </table>
              
              	<a href="{{ route('sales.create') }}" class="btn btn-primary"> <i class="icon-plus"></i> Add New Sale</a>

            		</div>

            </div>
          </div>
        </div>
      

	
	</div>

@stop

		