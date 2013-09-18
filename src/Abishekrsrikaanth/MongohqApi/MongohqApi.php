<?php namespace Abishekrsrikaanth\MongohqApi;

use Abishekrsrikaanth\MongohqApi\MongoHQ\Collections;
use Abishekrsrikaanth\MongohqApi\MongoHQ\Database;

class MongohqApi
{
	public function Database($apikey = "")
	{
		return new Database($apikey);
	}

	public function Collections($apikey = "")
	{
		return new Collections($apikey);
	}


}