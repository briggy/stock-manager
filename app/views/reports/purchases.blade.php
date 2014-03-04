@extends('admin')

@section('pt') {{ $pt }} @stop

@section('js')
@parent
<script type="text/javascript">
  
  $(document).ready(function(){

    $('.input-group.date').datepicker({
          todayBtn: "linked",
        
          minViewMode: 1,
          format: "yyyy-mm",
       

        todayHighlight: true,

    });

    
  });

</script>

@stop

@section('c')


<?php 
  $total = 0;
?>	
	 <div class="row">
        <div class="col-lg-12">


          <div class="widget">
            <div class="widget-content">

            		<div class="body">

                <div class="row">
          <div class="col-md-12">
            <button class="btn btn-primary" onclick="window.print()">Print</button> <br /> <br />
          </div>

          <div class="col-md-6">
             <h3 style="padding:0; margin:0;">{{ $date_text }}</h3>
          </div>

          {{ Form::open(['url'=>'reports/filter-sales']) }}
          {{ Form::hidden('filter_type', 'monthlyReport') }}


          <div class="col-md-5">

            <div class="input-group date">
              <input type="text" placeholder="Select Date" class="form-control" required name="date" value="{{ Input::get('date') }}"><span class="input-group-addon"><i class="icon-calendar"></i></span>
            </div>

          </div>  

          <div>
              <button class="btn">Select</button>
          </div>  

          {{ Form::close() }}

        </div>

                <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th class="">ID</th>
                      <th>Product Name</th>
                      <th class="">Stocks on Hand</th>
                      <th class="">Stocks on Shelves</th>
                      <th class="">Sold Items</th>
                      <th class="">Total Items</th>
                      <th class="">Price</th>
                      <th class="">Total Sales</th>
                    </tr>
                  </thead>
                  <tbody>

                  	@foreach($sales as $i=>$s)


                  	<tr>
                  		
                      <td>{{ $s->id }} </td>
                  		<td>{{ $s->product->name }}</td>
                      <td>{{ $s->product->stocksOnHand() }}</td>

                      <td>{{ $s->product->qtyShelves() }}</td>
                      <td>{{ $s->product->soldItems() }}</td>
                      <td>{{ $s->product->totalItems }}</td>

                  		<td>{{ number_format($s->price,2) }}</td>
                  		<td align="right"><b>{{ number_format($s->product->soldItems*$s->price,2) }}</b></td>

                      <?php $total += $s->product->soldItems*$s->price; ?>

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