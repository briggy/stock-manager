<?php

class Alert extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public static function text($id)
	{
		return self::find($id)->toArray();
	}
}
