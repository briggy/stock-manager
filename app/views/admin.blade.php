@extends('master')

@section('css')
	{{ HTML::style('style/dashboard.css') }}
	{{ HTML::style('datatables/css/datatables.css') }}
  {{ HTML::style('datepicker/css/datepicker3.css') }}
  {{ HTML::style('datepicker/css/datepicker.css') }}
@stop


@section('js')
	{{ HTML::script('datatables/js/jquery.dataTables.min.js') }}
	{{ HTML::script('datatables/js/datatables.js') }}
  {{ HTML::script('js/smooth-sliding-menu.js') }}

  {{ HTML::script('datepicker/js/bootstrap-datepicker.js') }}
	
	<script type="text/javascript">
		$(document).ready(function(){
      $(".tip").tooltip();
			$('.datatable').dataTable({"sPaginationType": "bs_full", "aaSorting": [[ 0, "desc" ]]});
			$('.datatable').each(function(){
				var datatable = $(this);
				// SEARCH - Add the placeholder for Search and Turn this into in-line form control
				var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
				search_input.attr('placeholder', 'Search');
				search_input.addClass('form-control input-sm');
				// LENGTH - Inline-Form control
				var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
				length_sel.addClass('form-control input-sm');
			});

			$(".destroy").submit(function(){

				var c = confirm("You are going to remove this product. Press OK to proceed and Cancel to Go Back");
				return c;

			});

		});
	</script>

@stop

@section('body')

	
	
<div class="container">
  <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pull-left" href="#"><i class="icon-reorder"></i> </a>
    <div class="brand pull-left"> <a href="{{ url('/') }}"><img src="{{ asset('') }}/images/logo.png" height="33" /></a></div>
    
    <ul class="nav navbar-nav navbar-right  hidden-xs">
      <li class="dropdown user hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-male"></i> <span class="username">
      {{ Auth::user()->name }}
      </span> <i class="icon-caret-down small"></i> </a>
        <ul class="dropdown-menu">
          <li><a href="{{ url('auth/logout') }}"><i class="icon-key"></i> Log Out</a></li>
        </ul>
      </li>
    </ul>
   
  </div>
</div>
<div class="wrapper">
  <div class="left-nav">
    <div id="side-nav">
      <ul id="nav">
        
       @foreach(Nav::with('subs')->parent()->get() as $nav)

        <li class="{{ Session::get('curr') == $nav->ref ? 'current' : '' }}"> 
        <a href="{{ url($nav->url) }}"> 
        	<i class="{{ $nav->icon }}"></i> {{ $nav->txt }} 
        	@if(count($nav->subs))
        	<span class="label label-info pull-right">{{ count($nav->subs) }}</span>
        	<i class="arrow icon-angle-left"></i>
        	@endif
        </a>

        @if(count($nav->subs))

          <ul class="sub-menu{{ Session::get('curr') == $nav->ref ? ' opened' : '' }}">
          @foreach($nav->subs as $sub)
            <li> <a href="{{ url($sub->url) }}"> <i class="{{ $sub->icon }}"></i> {{ $sub->txt }} </a> </li>
          @endforeach
          </ul>

        @endif

        </li>
         
       @endforeach
        <!-- <li> <a href="#"> <i class="icon-desktop"></i> UI Features <span class="label label-info pull-right">7</span> <i class="arrow icon-angle-left"></i></a>
          <ul class="sub-menu">
            <li> <a href="buttons.html"> <i class="icon-angle-right"></i> Buttons </a> </li>
            <li> <a href="tabs.html"> <i class="icon-angle-right"></i> Tabs</a> </li>
            <li> <a href="accordions.html"> <i class="icon-angle-right"></i> Accordions </a> </li>
            <li> <a href="nestable.html"> <i class="icon-angle-right"></i> Nestable List </a> </li>
            <li> <a href="icons.html"> <i class="icon-angle-right"></i> Icons </a> </li>
            <li> <a href="grid.html"> <i class="icon-angle-right"></i> Grid </a> </li>
            <li> <a href="dialogs.html"> <i class="icon-angle-right"></i> Dialogs </a> </li>
          </ul>
        </li>       -->
       </ul>
    </div>
  </div>
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          	<h2 class="page-title">@yield('pt')</h2>
        </div>
      </div>

      <div class="row">
      	<div class="col-lg-12">
      		@include('alerts')
      	</div>
      </div>


      @yield('c')

    </div>
  </div>
</div>
<div class="bottom-nav footer"> 2013 &copy; Annas Stock Manager Admin by ASSH Systems.  </div>
@stop