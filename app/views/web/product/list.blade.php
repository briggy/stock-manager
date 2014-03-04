@section('js')
		
  <script type="text/javascript">

		function addToCart(p_id){
			$.post('{{ url('web/cart') }}', {id:p_id}, function(data){
				$("#modal_cart .content").html(data);
			});
		} 

  </script>

@stop

<div class="gallery">
            <ul class="thumbnails">

            @foreach($products as $p)

              <li class="span3">
                <div class="thumbnail">
                  <img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 200px;" src="{{ $p->img() }}">

                  <div class="caption">
                    <h3>{{ Str::limit($p->name, 15) }}</h3>
                    <p><b>Php {{ number_format($p->price, 2) }} </b><br> {{ $p->qtyShelves() }} items left.</p>
                    <!-- <p><a href="#modal_details" data-toggle="modal" class="btn btn-primary">Details</a> -->
                    <a @if($p->qty()) href="#modal_cart" data-toggle="modal"  onclick="addToCart({{ $p->id }})" @else  disabled @endif class="btn">Add to Cart</a></p>
                  </div>
                </div>


                <br>
                <input type="text" name="textarea"/>
                <br>
                <input type="button" name="button" value="comment"/>
                <input type="reset" name="reset" value="clear"/>
                <br></br>

              </li>

            @endforeach

            </ul>
</div>