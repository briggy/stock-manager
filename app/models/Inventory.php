<?php

class Inventory extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function scopeLatest($q)
	{
		return $q->orderBy('id', 'desc');
	}

	public function scopeSales($q)
	{
		return $q->where('type', 'sales');
	}

	public function scopePurchases($q)
	{
		return $q->where('type', 'purchase');
	}

	public function scopeToday($q, $date = null)
	{
		$date = $date ? $date : date('Y-m-d');
		return $q->where('date',  $date);
	}

	public function scopeWeekly($q, $start, $end)
	{
		$start = $start ? $start : date('Y-m-d', strtotime('monday this week'));
		$end = $end ? $end : date('Y-m-d', strtotime('sunday this week'));

		return $q->whereBetween('date', array($start, $end));
	}

	public function scopeMonthly($q, $date = null)
	{
		$date = $date ? $date : date('Y-m');
		return $q->where('date', 'like', $date.'%');
	}

	public function items()
	{
		return $this->hasMany('Transaction');
	}

	public function supplier()
	{
		return $this->belongsTo('Supplier');
	}

	public function type()
	{
		$text = ['sales'=>'Stock Out', 'purchase'=>'Stock In'];
		return $text[$this->type];
	}


}
