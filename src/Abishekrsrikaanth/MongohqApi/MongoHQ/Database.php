<?php
namespace Abishekrsrikaanth\MongohqApi\MongoHQ;
use Illuminate\Support\Facades\Config;

class Database extends Executor
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

	public function get()
	{
		return $this->send('databases', array('_apikey' => $this->_key), "GET");
	}

	public function create($name, $slug)
	{
		return $this->send('/databases', array(
			'_apikey' => $this->_key,
			'name'    => $name,
			'slug'    => $slug
		), "POST");
	}

	public function info($name)
	{
		return $this->send('databases/' . $name, array('_apikey' => $this->_key), "GET");
	}

	public function drop($name)
	{
		return $this->send('databases/' . $name, array('_apikey' => $this->_key), "DELETE");
	}
}