<?php

class Transaction extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function product()
	{
		return $this->belongsTo('Product');
	}

	public function inventory()
	{
		return $this->belongsTo('Inventory');
	}

	public function scopeToday($q)
	{
		return $q->where('created_at', '=', time());
	}

	public function qtyFirstPurchased()
	{
		$t = Transaction::orderBy('id','asc')->where('product_id', $this->product->id)->first();
		return $t->remaining;
	}
}
