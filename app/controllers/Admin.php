<?php

class Admin extends BaseController {

	public function getIndex()
	{
		Session::put('curr', 'db');
		return View::make('admin.dashboard');
	}


	public function getAddShelves()
	{
		return View::make('purchases.addshelves');
	}


	public function checkStockOnHand()
	{
		foreach (Input::get('pid') as $i => $p_id) {
			$p = Product::find($p_id);
			$qty = Input::get('qty.'.$i);

			if($p->stocksOnHand() < $qty)
			return $p->name;
		}

		return false;
	}

	public function postPutShelves()
	{

		$outOfStocks = $this->checkStockOnHand();

		if($outOfStocks) return Redirect::back()->with('alert.danger', ['text'=>$outOfStocks.' have issuficient stocks on hand!', 'icon'=>'icon-warning-sign']);


		$p_ids = Input::get('pid');
		$qty = Input::get('qty');
		foreach ($p_ids as $i => $pid) {
			Shelve::create(['product_id'=>$pid, 'qty'=>$qty[$i]]);
		}

		return Redirect::to('products')->with('alert.success', Alert::text('suc_sh'));
	}

	public function login()
	{
		if(!Auth::guest()) return Redirect::to('');
		return View::make('login');
	}

}
