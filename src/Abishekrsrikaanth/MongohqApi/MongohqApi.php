<?php namespace Abishekrsrikaanth\MongohqApi;

use Abishekrsrikaanth\MongohqApi\MongoHQ\Collections;
use Abishekrsrikaanth\MongohqApi\MongoHQ\Database;
use Abishekrsrikaanth\MongohqApi\MongoHQ\Indexes;
use Abishekrsrikaanth\MongohqApi\MongoHQ\Users;

class MongohqApi
{
	/**
	 * Creates an Instance of the Databases Class
	 * @param string $apikey
	 *
	 * @return Database
	 */public function Database($apikey = "")
	{
		return new Database($apikey);
	}

	/**
	 * Creates an Instance of the Collection Class
	 * @param string $apikey
	 * @return Collections
	 */public function Collections($apikey = "")
	{
		return new Collections($apikey);
	}

	/**
	 * Creates an Instance of the Indexes Class
	 * @param string $apikey
	 * @return Indexes
	 */public function Indexes($apikey = "")
	{
		return new Indexes($apikey);
	}

	/**
	 * Creates an Instance of the Users Class
	 * @param string $apikey
	 * @return Users
	 */public function Users($apikey = "")
	{
		return new Users($apikey);
	}
}