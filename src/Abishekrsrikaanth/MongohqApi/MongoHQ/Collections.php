<?php namespace Abishekrsrikaanth\MongohqApi\MongoHQ;

class Collections extends Executor
{
	private $_key = "";

	public function __construct($key = "")
	{
		if ($key == "") {
			$key = Config::get('mongohqapi::config.api_key');
			if (empty($key)) {
				throw new \Exception('MongoHQ API Key is missing');
			}
		}
		$this->_key = $key;
	}

	public function get($db)
	{
		return $this->send('/databases/' . $db . '/collections', array('_apikey' => $this->_key), "GET");
	}

	public function create($db, $name)
	{
		return $this->send('/databases/' . $db . '/collections', array(
			'_apikey' => $this->_key,
			'name'    => $name
		), "POST");
	}

	public function stats($db, $collection)
	{
		return $this->send('/databases/' . $db . '/collections/' . $collection, array('_apikey' => $this->_key), "GET");
	}

	public function rename($db, $old_name, $new_name)
	{
		return $this->send('/databases/' . $db . '/collections/' . $old_name, array(
			'_apikey' => $this->_key,
			'name'    => $new_name
		), "PUT");
	}

	public function drop($db, $name)
	{
		return $this->send('/databases/' . $db . '/collections/' . $name, array('_apikey' => $this->_key), "DELETE");
	}
}