@extends('admin')

@section('pt')  Suppliers <small>Please use the table below to navigate or filter the results.</small>  @stop

@section('c')
	
	<div class="row">
		

        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header">
             
              <i class="icon-tasks"></i><h3>List Suppliers</h3>
            </div>
            <div class="widget-content">

            		<div class="body">
            		
                <table class="table table-striped  datatable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Company</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>City</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($sp as $i=>$s)
                    <tr>
                      <td>{{ $s->name }}</td>
                      <td>{{ $s->company }}</td>
                      <td>{{ $s->phone }}</td>
                      <td>{{ $s->email }}</td>
                      <td>{{ $s->city }}</td>
                      <td>

                      {{ Form::open(['route'=>['suppliers.destroy', $s->id], 'method'=>'DELETE', 'class'=>'destroy']) }}

                      	<a href="{{ route('suppliers.edit', $s->id) }}" class="btn btn-sm btn-primary"> Edit </a>
                        <button class="btn btn-sm btn-warning"> Delete </button>

                      {{ Form::close() }}

                      </td>
                    </tr>	
                   @endforeach


                    
                  </tbody>
                </table>
              
              	<a href="{{ route('suppliers.create') }}" class="btn btn-primary"> <i class="icon-plus"></i> Add Supplier</a>

            		</div>

            </div>
          </div>
        </div>
      

	</div>

@stop