<?php

class Nav extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function scopeParent($q)
	{
		return $q->where('parent_id', null)->orderBy('order', 'asc');
	}

	public function subs()
	{
		return $this->hasMany('Nav', 'parent_id');
	}
}
