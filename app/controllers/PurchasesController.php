<?php

class PurchasesController extends BaseController {

	public function __construct()
	{
		Session::put('curr', 'pu');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pos = Inventory::with('supplier')->latest()->purchases()->get();
        return View::make('purchases.index', compact('pos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('purchases.create');
	}

	public function totalCost()
	{
		$total_cost = 0;

		foreach (Input::get('pid') as $i=>$p_id) {
			$cost = Product::find($p_id)->cost; 
			$qty = Input::get('qty.'.$i);

			$total_cost += $qty*$cost;
		}

		return $total_cost;
	}

	public function setTransaction($inv)
	{
		foreach (Input::get('pid') as $i => $p_id) {
			$p = Product::find($p_id);
			$qty = Input::get('qty.'.$i);

			$t = [
				'product_id'=>$p_id,
				'inventory_id'=>$inv->id,
				'qty'=>$qty,
				'remaining'=>$p->qty()+$qty,
				'cost'=>$p->cost,
				'price'=>$p->price,
				'total'=>$qty*$p->cost
			];

			Transaction::create($t);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$inventory = Input::except('pid','qty');
		
		$total_cost = $this->totalCost();

		$inventory['total_cost'] = $total_cost;
		$inv = Inventory::create($inventory);

		$this->setTransaction($inv);

		return Redirect::route('purchases.index')->with('alert.success', Alert::text('saddpo'));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('purchases.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$po = Inventory::with('items', 'items.product')->find($id);
        return View::make('purchases.edit', compact('po'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inventory = Input::except('pid','qty', 'search');
		
		$total_cost = $this->totalCost();

		$inventory['total_cost'] = $total_cost;
		$inv = Inventory::find($id);
		$inv->update($inventory);

		Transaction::where('inventory_id', $id)->delete();
		$this->setTransaction($inv);

		return Redirect::route('purchases.index')->with('alert.success', Alert::text('suppo'));
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Inventory::find($id)->delete();
		return Redirect::back()->with('alert.warning', Alert::text('sdelpo'));
	}

}
