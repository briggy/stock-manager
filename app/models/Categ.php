<?php

class Categ extends Eloquent {
	protected $guarded = array();

	public static $rules = array();


	public static function setGuard(array $gs)
	{
		//self::$guarded = $gs;
	
	}

	public function scopeParent($q)
	{
		return $q->where('parent_id', null);
	}

	public function products()
	{
		return $this->hasMany('Product');
	}

	public function subs()
	{
		return $this->hasMany('Categ', 'parent_id');
	}

	public function parent()
	{
		return $this->belongsTo('Categ', 'parent_id');
	}

	public static function getList()
	{
		$list = array(''=>'Select Category');

		foreach (self::with('subs')->where('parent_id', null)->get() as $c) {
			foreach ($c->subs as $s) {
				$list[$c->name][$s->id] = $s->name;
			}
		}

		return $list;
	}

	public static function getParentList()
	{
		$list = array(''=>'');
		foreach (self::with('subs')->parent()->get() as $c) {

				$list[$c->id] = $c->name;
			
		}

		return $list;
	}
}
