<script type="text/javascript">

$(document).ready(function(){


	@if(count($products))
		$(".modal-footer a").removeClass('disabled');
	@else
		$(".modal-footer a").addClass('disabled');
	@endif

	$(".cart_qty").change(function(){
		countTotal();
	});

	countTotal();

	$(".void_item").click(function(){
		var value = $(this).data('value');
		$.post('{{ url('web/void-item') }}', {value:value});
		$(this).parent().parent().remove();
		countTotal();
	});

	@if(isset($hide_qty))
		$(".cart_qty").parent().html(1);
	@endif
});

</script>

<style type="text/css">
	
	.table-cart {
		font-size: 12px;
	}

</style>

<table class="table table-condensed table-striped table-cart">
	
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th>Price</th>
			<th>Qty</th>
			<th colspan="2">Subtotal</th>
		</tr>
	</thead>

	<tbody>

		@foreach($products as $index => $p)
		<tr>
			<td><img src="{{ $p->img() }}" style="width:50px" /></td>
			<td>{{ $p->name }}</td>
			<td>Php {{ number_format($p->price,2) }}</td>
			<td>  {{ Form::select('qty['.$p->id.']', $p->arrayQty(), 1, ['style'=>'width:50px;', 'data-price'=>$p->price, 'class'=>'cart_qty']) }} </td>
			<td class="subtotal">Php {0.00}</td>
			<td><a href="#void_item" class="void_item" data-value="{{ $p->id }}"> <i class="icon-remove"></i></a> </td>
		</tr>
		@endforeach

	</tbody>

	<tfoot>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><b>Total:</b> </td>
			<td class="totalCost">{0.00}</td>
			<td> </td>
		</tr>
	</tfoot>


</table>

{{ Form::hidden('total_cost') }}
