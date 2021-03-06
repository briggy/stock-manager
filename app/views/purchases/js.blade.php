{{ HTML::script('typeahead/bootstrap3-typeahead.min.js') }}
	<script type="text/javascript">
		$(document).ready(function(){
			$(".removeItem").click(removeItem);

			$('.search-product').typeahead(
			{
				source: function (query, process) {
						    products = [];
						    map = {};
						 
						    var data = {{ Product::get(['name', 'id', 'cost']) }};
						 
						    $.each(data, function (i, product) {
						        map[product.name] = product;
						        products.push(product.name);
						    });
						 
						    process(products);
						},

				updater: function (item) {
				    p = map[item];
				    t = '<tr> <input type="hidden" name="pid[]" value="'+p.id+'" />'
				    t += '<td>'+p.name+'</td>';
				    t += '<td>{{ Form::text('qty[]', 1, ['required', 'pattern'=>'[0-9]{1,5}']) }}</td>';
				    t += '<td>'+p.cost.toFixed(2)+'</td>';
				    t += '<td><a href="#" title="remove item" class="tip2 removeItem"> <i class="icon-trash"></i> </a></td>';
				    t += '</tr>';

				    $("tbody").append(t);
					$(".tip2").tooltip();
					$(".removeItem").click(removeItem);

				    return '';
				}

			}
		);
	});

	function removeItem(){
		var confirmed = confirm('Click OK to Remove this Item or Cancel to go back.');
		if(confirmed)
		$(this).parent().parent().remove();
	}
	</script>