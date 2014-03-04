<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Anna's Electrical Supply</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="your site description here" />
<meta name="author" content="website author name here" />
<!-- Le styles -->
	{{ HTML::style('webassets/css/bootstrap.css') }}
<style>
      body {
	    background:#FFF top center repeat-x;
      }
</style>
<!--[if lt IE 9]>
	{{ HTML::style('webassets/css/ie.css') }}
    <![endif]-->
	
	{{ HTML::style('webassets/css/bootstrap-responsive.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Lobster|Oswald') }}

	{{ HTML::script('webassets/js/jquery.js') }}


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js') }}
    <![endif]-->
<!-- Le fav and touch icons -->

<link rel="shortcut icon" href="{{ url() }}/assets/ico/favicon.ico" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url() }}/assets/ico/apple-touch-icon-144-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url() }}/assets/ico/apple-touch-icon-114-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url() }}/assets/ico/apple-touch-icon-72-precomposed.png" />
<link rel="apple-touch-icon-precomposed" href="{{ url() }}/assets/ico/apple-touch-icon-57-precomposed.png" />

<style type="text/css">
a:link {
	color: ##FF0;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body bgcolor="#CCCCCC">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="logo_navbar" >
	 <img src="{{ url('webassets') }}/homelogo.jpg" />
</div>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner homenav">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</a>
			<div class="nav-collapse collapse">
			  <ul class="nav">
	      <li class="active"></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>			
					<li></li>
			  </ul>
			  <ul class="nav">
              
		        <li {{ $active == 'home' ? 'class="active"' : '' }}><a href="{{ url('web') }}">Home</a></li>
		        <li {{ $active == 'about' ? 'class="active"' : '' }}><a href="{{ url('web/about') }}">About</a></li>
		        <li {{ $active == 'comment' ? 'class="active"' : '' }}><a href="{{ url('web/comments') }}">Comment</a></li>
		        <li {{ $active == 'gallery' ? 'class="active"' : '' }}><a href="{{ url('web/gallery') }}">Gallery</a></li>
		        <!-- <li><a href="products.html">Supplies</a></li> -->
		        <li {{ $active == 'products' ? 'class="active"' : '' }}><a href="{{ url('web/products') }}">Products</a></li>
		        <li {{ $active == 'chat' ? 'class="active"' : '' }}><a href="{{ url('web/chat') }}">Chat</a></li>
		       <!-- <li><a href="contact.html">Contacts</a></li>-->
	          </ul></ul>
		  </div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>

<div class="pauseline"></div>

@yield('top_content')

<div class="container">
	<div class="row">
		<div class="span10 hero-unit offset1">
			<h1>{{ isset($head_title) ? $head_title : 'Annas Electrical Supply' }}</h1>
		</div>
	</div>
</div>

<div class="pauseline"></div>

<div class="container">
	
	@yield('content')

</div>

<!-- /container -->
<div class="shadowfooter">
</div>
<footer class="footer marginfooter">
<div class="container">
	<p id="back-top" class="pull-right">
		<a href="#top"><span></span></a>
	</p>
	<div class="row">
		<div class="span4">
			<p>&nbsp;</p>
			<p />
				<a href="#twitterlink"><img src="{{ url() }}/webassets/img/socialtwt.png" alt="Twitter" class="socialimage" /></a>
				<a href="#facebooklink"><img src="{{ url() }}/webassets/img/socialfb.png" alt="Facebook" class="socialimage" /></a>
				<a href="#youtubelink"><img src="{{ url() }}/webassets/img/socialyt.png" alt="You Tube" class="socialimage" /></a>
			</div>
			<div class="span4">
				<p>
					<span class="contactandpartner"><strong>QUICK CONTACT</strong></span>
				</p>
				<h5>&nbsp&nbsp&nbsp&nbsp Phone number: (035) 225-3884/ (035) 225-4673 </h5>
                <h5>&nbsp&nbsp&nbsp&nbsp E-mail address: annas.electrical@rocketmail.com</h5>
                
                
			</div>
			<div class="span2">
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
	</footer>

	@include('web.modals')


	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	{{ HTML::script('webassets/js/bootstrap-transition.js') }}
	{{ HTML::script('webassets/js/bootstrap-transition.js') }}
	{{ HTML::script('webassets/js/bootstrap-alert.js') }}
	{{ HTML::script('webassets/js/bootstrap-modal.js') }}
	{{ HTML::script('webassets/js/bootstrap-dropdown.js') }}
	{{ HTML::script('webassets/js/bootstrap-scrollspy.js') }}
	{{ HTML::script('webassets/js/bootstrap-tab.js') }}
	{{ HTML::script('webassets/js/bootstrap-tooltip.js') }}
	{{ HTML::script('webassets/js/bootstrap-popover.js') }}
	{{ HTML::script('webassets/js/bootstrap-button.js') }}
	{{ HTML::script('webassets/js/bootstrap-collapse.js') }}
	{{ HTML::script('webassets/js/bootstrap-carousel.js') }}
	{{ HTML::script('webassets/js/bootstrap-typeahead.js') }}
	{{ HTML::script('webassets/js/scrolltotop.js') }}

	<script type="text/javascript">

		function countTotal(){
			var totalCost = 0;
			$(".cart_qty").each(function(){
				var qty = $(this).val();
				var price = $(this).data('price');

				$(this).parent().siblings(".subtotal").html("Php " + (qty*price).toFixed(2));

				totalCost += qty*price;
			});
			
			$(".totalCost").html("Php "+totalCost.toFixed(2));
			$("input[name='total_cost']").val(totalCost);

		}

	</script>

	@yield('js')
	
	</body>
	</html>