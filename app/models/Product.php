<?php

class Product extends Eloquent {
	protected $guarded = array('file');

	public static $rules = array();

	public function scopeRandom($q)
	{
		return $q->orderBy(DB::raw('RAND()'));
	}

	public function arrayQty()
	{
		$range = [];
		for ($i=0; $i <= $this->qty(); $i++) { 
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
}
