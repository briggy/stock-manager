@extends('admin')

@section('pt') {{ $pt }} @stop

@section('js')
@parent

<script type="text/javascript">
  
  $(document).ready(function(){
    $('.input-group.date').datepicker({
        todayBtn: "linked",
        
        @if($filter_type == 'monthly')
          minViewMode: 1,
          format: "yyyy-mm",
        @else
          format: "yyyy-mm-dd",
        @endif

        todayHighlight: true,

    });

    $('.input-daterange').datepicker({
        calendarWeeks: true,
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd"
    });
  });

</script>

@stop

@section('c')
	
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
          {{ Form::hidden('filter_type', $filter_type) }}


          <div class="col-md-5">
            @if($filter_type == 'daily' || $filter_type == 'monthly')

            <div class="input-group date">
              <input type="text" placeholder="Select Date" class="form-control" required name="date"><span class="input-group-addon"><i class="icon-calendar"></i></span>
            </div>

            @elseif($filter_type = 'weekly')

            <div class="input-daterange input-group col-md-12" id="datepicker">
              <input type="text" required placeholder="Select Start Date" class="input-sm form-control" name="start" />
              <span class="input-group-addon" style="color:#000">to</span>
              <input type="text" required placeholder="Select End  Date" class="input-sm form-control" name="end" />
           </div>

            @endif
          </div>  

          <div>
              <button class="btn">Select</button>
          </div>  

          {{ Form::close() }}

        </div>
               
               <br>   
            		
                <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th class="">ID</th>
                      <th>Product Name</th>
                      <th class="">Quantity</th>
                      <th class="">Price</th>
                      <th class="" align="right">Total</th>
                    </tr>
                  </thead>
                  <tbody>

                  	@foreach($sales as $i=>$s)


                  	<tr>
                  		
                      	<td>{{ $s->id }}</td>
                  		<td>{{ $s->product->name }}</td>
                  		<td>{{ $s->qty }}</td>
                  		<td>{{ number_format($s->price,2) }}</td>
                  		<td align="right"><b>{{ number_format($s->total,2) }}</b></td>

                  	</tr>

                  	@endforeach
                 
                  	<tfoot>
                  		
                  		
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