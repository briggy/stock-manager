<?php

class Product extends Eloquent {
	protected $guarded = array('file');

	public $totalItems = 0;

	public static $rules = array();

	public function shelves()
	{
		return $this->hasMany('Shelve');
	}

	public function scopeRandom($q)
	{
		return $q->orderBy(DB::raw('RAND()'));
	}

	public function arrayQty()
	{
		$range = [];
		for ($i=0; $i <= $this->qtyShelves(); $i++) { 
			$range[] = $i;
		}

		return $range;
	}

	public function categ()
	{
		return $this->belongsTo('Categ');
	}

	public function img()
	{
		$file = 'uploads/product_'.$this->id.'.jpg';
		
		if(file_exists(public_path($file))){
			return asset($file);
		}

		return asset('uploads/na.jpg');
	}

	public function qty()
	{
		$i = Inventory::purchases()->lists('id');
		$s = Inventory::sales()->lists('id');
		if(!$i) return 0;

		$total = Transaction::whereIn('inventory_id', $i)->where('product_id', $this->id)->sum('qty');
		$sales = 0;

		if($s)
		$sales = Transaction::whereIn('inventory_id', $s)->where('product_id', $this->id)->sum('qty');

		return $total-$sales;
	}

	public function qtyShelves()
	{
		$sales = 0;

		$s = Inventory::sales()->lists('id');

		if($s)
		$sales = Transaction::whereIn('inventory_id', $s)->where('product_id', $this->id)->sum('qty');

		$shelves = $this->shelves()->sum('qty');

		$qtyShelves = $shelves - $sales;

		$this->totalItems += $qtyShelves;
		return $qtyShelves;
		
	}

	public function stocksOnHand()
	{
		// Shelves
		$shelves = $this->qtyShelves();

		// Sales Qry
		$sales = 0;
		$s = Inventory::sales()->lists('id');
		if($s)
		$sales = Transaction::whereIn('inventory_id', $s)->where('product_id', $this->id)->sum('qty');

		// Total Qty
		$i = Inventory::purchases()->lists('id');
		if(!$i) return 0;
		$total = Transaction::whereIn('inventory_id', $i)->where('product_id', $this->id)->sum('qty');


		// Stocks On Hand
		$stocksOnHand = $total-($shelves+$sales);

		$this->totalItems = $stocksOnHand;

		return $stocksOnHand;
	}


	public function soldItems()
	{
		$sales = 0;
		$s = Inventory::sales()->lists('id');

		if($s)
		$sales = Transaction::whereIn('inventory_id', $s)->where('product_id', $this->id)->sum('qty');

		$this->totalItems += $sales;
		$this->soldItems = $sales;

		return $sales ? $sales : 0;
	}

	public function added()
	{
		$i = Inventory::purchases()->lists('id');
		$t = Transaction::orderBy('id', 'asc')->whereIn('inventory_id', $i)->where('product_id', $this->id)->get();
		$total = 0;

		if(count($t)){
			unset($t[0]);
		}

		foreach ($t as $v) {
			$total += $v->qty;
		}

		return $total;
		
	}
}
