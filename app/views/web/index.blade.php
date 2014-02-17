@extends('web')

@section('top_content')
	
	<div class="container">
	<div class="row">
		
		<div class="span15">
			<div id="myCarousel" class="carousel slide">
				<!-- Carousel items make sure image size is width765 and height340-->
				<div class="carousel-inner">
					<div class="active item">
						<img src="{{ url() }}/webassets/img/slide1.jpg" alt="photo name" width="100%"  />
						<div class="carousel-caption">
							<!--<h4>Hardware</h4>-->
							<p>
								
						  </p>
						</div>
					</div>
					<div class="item">
						<img src="{{ url() }}/webassets/img/slide2.jpg" alt="photo name" width="100%" />
						<div class="carousel-caption">
							<!--<h4>Wirings</h4>-->
							<p>
								
						  </p>
						</div>
					</div>
					<div class="item">
						<img src="{{ url() }}/webassets/img/slide3.jpg" alt="photo name" width="100%" />
						<div class="carousel-caption">
							<!--<h4>Lighting</h4>-->
							<p>
								
						  </p>
						</div>
					</div>
				</div>
				<!-- Carousel nav -->
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
				<div class="clearfix">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /container -->
<div class="topshadow">
</div>

@stop

@section('product') 

	@include('web.product.list')
	
@stop

@section('content')
  	
  	@section('product')
  		@parent();
  	@show
	
@stop


