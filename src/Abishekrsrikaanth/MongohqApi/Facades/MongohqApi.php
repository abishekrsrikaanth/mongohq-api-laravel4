<?php namespace Abishekrsrikaanth\MongohqApi\Facades;

use Illuminate\Support\Facades\Facade;

class MongohqApi extends Facade
{
	protected static function getFacadeAccessor()
	{
		return "mongohqapi";
	}
}