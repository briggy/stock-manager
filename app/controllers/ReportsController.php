<?php

class ReportsController extends BaseController {

	public function __construct()
	{
		Session::put('curr', 'rp');
	}

	public function purchaseQry($i)
	{
		$qry = $i ? Transaction::with('product.shelves')->orderBy('id', 'asc')->select(DB::raw('*,  sum(qty) as qty,  sum(total) as total'))->groupBy('product_id')->whereIn('inventory_id', $i)->get() : array(); 
		// $qry = $i ? Transaction::with('product', 'inventory')->orderBy('id', 'desc')->whereIn('inventory_id', $i)->get() : array(); 
		return $qry;
	}

	public function salesQry($i)
	{
		$qry = $i ? Transaction::with('product')->orderBy('id', 'desc')->select(DB::raw('*, sum(qty) as qty, min(remaining) as remaining, sum(total) as total'))->groupBy('product_id')->whereIn('inventory_id', $i)->get() : array(); 
		return $qry;
	}

	public function totalSales($i)
	{
		return $i ? Transaction::with('product')->whereIn('inventory_id', $i)->sum('total') : 0;
	}	

	// Filter Sales Report
	public function postFilterSales()
	{

		// return Input::all();
		$type = Input::get('filter_type');

		if($type == 'daily'):
			$date = Input::get('date');
			return $this->getDailySales($date);
		elseif($type == 'weekly'):
			$start = Input::get('start');
			$end = Input::get('end');
			return $this->getWeeklySales($start, $end);
		elseif($type == 'monthly'):
			$date = Input::get('date');
			return $this->getMonthlySales($date);
		elseif($type == 'monthlyReport'):
			$date = Input::get('date');
			return $this->getMonthlyReports($date);
		endif;
	}

	// Sales Report Method
	
	public function getDailySales($custom_date = null)
	{
		$date_text = $custom_date ? date('M d, Y', strtotime($custom_date)) : 'Today ('.date('M d, Y').')'; //'Today ('.date('M d, Y').')'
		$date_text = 'Sales as of '.$date_text;

		$i = Inventory::sales()->today($custom_date)->lists('id');

		// Sales Qry
		$sales = $i ? Transaction::with('product')->orderBy('id', 'desc')->whereIn('inventory_id', $i)->get() : array(); 

		// $sales = $this->salesQry($i);
		$total = $this->totalSales($i);
		$pt = 'Daily Sales';
		$hide_datetime = true;
		$filter_type = 'daily';
		return View::make('reports.dailysales', compact('sales', 'total', 'pt', 'date_text', 'hide_datetime', 'filter_type'));
	}

	public function getWeeklySales($start_date = null, $end_date = null)
	{
		$start_date_f = date('M d, Y', strtotime($start_date));
		$end_date_f = date('M d, Y', strtotime($end_date));

		$date_text = $start_date ? 'Sales on '.$start_date_f.' to '.$end_date_f : 'Sales as of this Week';
		$filter_type = 'weekly';

		$hide_datetime = true;


		$i = Inventory::sales()->weekly($start_date, $end_date)->lists('id');
		$sales = $this->salesQry($i);
		$total = $this->totalSales($i);
		$pt = 'Weekly Sales';
		return View::make('reports.weekmonthsales', compact('sales', 'total', 'pt', 'filter_type', 'date_text', 'hide_datetime'));
	}

	public function getMonthlySales($custom_date = null)
	{
		$date_text = $custom_date ? date('F', strtotime($custom_date)) : date('F');
		$date_text = 'Sales as of the Month of '.$date_text;
		$filter_type = 'monthly';

		$hide_datetime = true;

		$i = Inventory::sales()->monthly($custom_date)->lists('id');
		$sales = $this->salesQry($i);
		$total = $this->totalSales($i);
		$pt = 'Monthly Sales';

		return View::make('reports.weekmonthsales', compact('sales', 'total', 'pt', 'filter_type', 'date_text', 'hide_datetime'));
	}

	public function getMonthlyReports($date = null)
	{
		$i = Inventory::monthly($date)->lists('id');
		// $sales_list = Inventory::sales()->lists('id');
		// $purchases_list = Inventory::purchases()->lists('id');


		$date_text = $date ? date('F', strtotime($date)) : date('F');
		$date_text = 'Reports as of the Month of '.$date_text;

		$sales = $this->purchaseQry($i);

		$total = $this->totalSales($i);
		// $total_sales = $this->totalSales($sales_list);
		// $total_purchase = $this->totalSales($purchases_list);
		
		$pt = 'Monthly Report';
		return View::make('reports.purchases', compact('sales', 'i', 'total', 'pt', 'date_text'));
		// return View::make('reports.purchases', compact('sales', 'total_sales', 'total_purchase', 'pt'));
	}

}