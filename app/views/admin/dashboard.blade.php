@extends('admin')

@section('pt') Dashboard <small>Welcome to Annas Stock Manager</small> @stop

@section('c')
	
	<div class="row">
		

        <div class="col-lg-6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Current Stats</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <h6 class="bigstats">See your overall statistics.</h6>
                <div class="cf" id="big_stats">
                  <div class="stat"> <i class="icon-list tip" title="Products Added"></i> <span class="value">{{ Product::all()->count() }}</span> </div>
                  <!-- .stat -->
                  
                  <div class="stat"> <i class="icon-repeat tip" title="Purchases"></i> <span class="value">{{ Inventory::purchases()->count() }}</span> </div>
                  <!-- .stat -->
                  
                  <div class="stat"> <i class="icon-money tip" title="Sales"></i> <span class="value">{{ Inventory::sales()->count() }}</span> </div>
                  <!-- .stat -->
                  
                  <div class="stat"> <i class="icon-group tip" title="Suppliers"></i> <span class="value">{{ Supplier::all()->count() }}</span> </div>
                  <!-- .stat --> 
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Important Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> <a class="shortcut" href="{{ route('products.index') }}"> <i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Product</span> </a>
              <a class="shortcut" href="{{ route('purchases.index') }}"><i class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">Purchases</span> </a>
              <a class="shortcut" href="{{ route('sales.index') }}"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Sales</span> </a>
              <a class="shortcut" href="{{ route('suppliers.index') }}"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Suppliers</span> </a>
              <a class="shortcut" href="{{ url('reports/daily-sales') }}"><i class="shortcut-icon icon-file"></i><span class="shortcut-label">Daily Sales</span> </a>
              <a class="shortcut" href="{{ url('reports/weekly-sales') }}"><i class="shortcut-icon icon-file"></i><span class="shortcut-label">Weekly Sales</span> </a>
              <a class="shortcut" href="{{ url('reports/monthly-sales') }}"><i class="shortcut-icon icon-file"></i><span class="shortcut-label">Monthly Sales</span> </a>
              </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
      

	</div>

@stop