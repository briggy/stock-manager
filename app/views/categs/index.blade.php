@extends('admin')

@section('pt')  Categories <small>Please use the table below to navigate or filter the results.</small>  @stop

@section('c')
	
	<div class="row">
		

        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header">
             
              <i class="icon-tasks"></i><h3>List Categories</h3>
            </div>
            <div class="widget-content">

            		<div class="body">
            		
                <table class="table table-striped  datatable">
                  <thead>
                    <tr>
                      <th class="">No.</th>
                      <th class="">Category Code</th>
                      <th>Category Name</th>
                      <th>Parent Category</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($cats as $i=>$c)
                    <tr>
                      <td class="">{{ $i+1 }}</td>
                      <td class="">{{ $c->code }}</td>
                      <td>{{ $c->name }}</td>
                      <td>{{ $c->parent ? $c->parent->name : '' }}</td>
                      <td>

                      {{ Form::open(['route'=>['categs.destroy', $c->id], 'method'=>'DELETE', 'class'=>'destroy']) }}

                      	<a href="{{ route('categs.edit', $c->id) }}" class="btn btn-sm btn-primary"> Edit </a>
                        <button class="btn btn-sm btn-warning"> Delete </button>

                      {{ Form::close() }}

                      </td>
                    </tr>	
                   @endforeach


                    
                  </tbody>
                </table>
              
              	<a href="{{ route('categs.create') }}" class="btn btn-primary"> <i class="icon-plus"></i> Add Category</a>

            		</div>

            </div>
          </div>
        </div>
      

	</div>

@stop