@extends('admin')

@section('pt') {{ $pt }} @stop

@section('c')
	
	 <div class="row">
        <div class="col-lg-12">


          <div class="widget">
            <div class="widget-content">

            		<div class="body">

        <button class="btn btn-primary" onclick="window.print()">Print</button> <br /> <br />


            		
                <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th class="">ID</th>
                      <th class="">Datetime</th>
                      <th class="">Product Code</th>
                      <th>Product Name</th>
                      <th class=""># of Purchased Items &nbsp;</th>
                      <th class="">Remaining</th>
                      <th class="">Unit Cost</th>
                      <th class="">Total</th>
                    </tr>
                  </thead>
                  <tbody>

                  	@foreach($sales as $i=>$s)


                  	<tr>
                  		
                      <td>{{ $s->id }}</td>
                      <td>{{ date('M, d Y', strtotime($s->created_at)) }}</td>
                  		<td>{{ $s->product->code }}</td>
                  		<td>{{ $s->product->name }}</td>
                  		<td>{{ $s->qty }}</td>
                  		<td>{{ $s->product->qty() }}</td>
                  		<!-- <td>{{ $s->inventory->type() }}</td> -->
                  		<td>{{ number_format($s->cost,2) }}</td>
                  		<td align="right"><b>{{ number_format($s->total,2) }}</b></td>

                  	</tr>

                  	@endforeach
                 
                  	<tfoot>
                  		
                  		<tr>
                  			<!-- <td></td> -->
                        	<td></td>
                  			<td></td>
                  			<td></td>
                  			<td></td>
                  			<td></td>
                  			<td></td>
                  			<td align="right">Total : </td>
                  			<td align="right"><b>{{ number_format($total,2) }}</b></td>
                  		</tr>

                  	</tfoot>

                    
                  </tbody>
                </table>
              

            		</div>
           </div>
           </div>
         </div>
       </div>

@stop