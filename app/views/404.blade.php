@extends('master')

@section('body')


<div class="widget-404" style="margin-top: 50px;">
<div class="row">
      <div class="col-md-5">
          <h1 class="text-align-center">404</h1>
      </div>
      <div class="col-md-7">
          <div class="description">
              <h3>Oops! You're lost.</h3>
              <p>We can not find the page you're looking for.<br />
<strong><a href="{{ url() }}">Return home</a></strong> or try the close this window. :p </p>
          </div>
      </div>
    </div>



</div>







<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 



 
@stop