<?php namespace Abishekrsrikaanth\MongohqApi\MongoHQ;

/**
 * Class Indexes
 *
 * @package Abishekrsrikaanth\MongohqApi\MongoHQ
 */class Indexes extends Executor
{
	/**
	 * @var string
	 */private $_key = "";

	/**
	 * Constructor. Takes the API Key as a Parameter. If missing, reads from the config file
	 * @param string $key
	 * @throws \Exception Mongo API Key is missing
	 */public function __construct($key = "")
	{
		if ($key == "") {
			$key = Config::get('mongohqapi::config.api_key');
			if (empty($key)) {
				throw new \Exception('MongoHQ API Key is missing');
			}
		}
		$this->_key = $key;
	}

	/**
	 * Gets all the indexes for the given DB and Collection
	 * @param $db
	 * @param $collection
	 * @return mixed
	 */public function get($db, $collection)
	{
		return $this->send('/databases/' . $db . '/collections' . $collection . 'indexes', array('_apikey' => $this->_key), "GET");
	}

	/**
	 * Creates an Index for the given DB and Collection.
	 * @param       $db
	 * @param       $collection
	 * @param array $spec
	 * @param array $options
	 * @return mixed
	 */public function create($db, $collection, array $spec = array(), array $options = array())
	{
		$data = array_merge($spec, $options);

		return $this->send('/databases/' . $db . '/collections' . $collection . 'indexes', array_merge(array('_apikey' => $this->_key), $data), "POST");
	}

	/**
	 * Deletes an index for the given DB, Collection and Index Name
	 * @param $db
	 * @param $collection
	 * @param $name
	 * @return mixed
	 */public function drop($db, $collection, $name)
	{
		return $this->send('/databases/' . $db . '/collections' . $collection . 'indexes/' . $name, array('_apikey' => $this->_key), "DELETE");
	}

	/**
	 * Deletes all the indexes from a given DB and Collection
	 * @param $db
	 * @param $collection
	 * @return mixed
	 */public function dropAll($db, $collection)
	{
		return $this->send('/databases/' . $db . '/collections' . $collection . 'indexes', array('_apikey' => $this->_key), "DELETE");
	}
}