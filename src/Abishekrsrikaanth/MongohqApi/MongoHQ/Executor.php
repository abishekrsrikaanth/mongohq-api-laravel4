<?php namespace Abishekrsrikaanth\MongohqApi\MongoHQ;

use Guzzle\Service\Client;


class Executor
{
	private $_base_url = 'https://api.mongohq.com';


	/**
	 * Sends a HTTP Call with the given parameters
	 * @param $url
	 * @param $obj
	 * @param $type
	 *
	 * @return mixed
	 */protected final function send($url, $obj, $type)
	{
		$client  = new Client($this->_base_url);
		$request = null;
		switch ($type) {
			case "GET":
			{
				$request = $client->get($url, array(), array('query' => $obj));
				break;
			}
			case "POST":
			{
				$request = $client->post($url, array(), $obj);
				break;
			}
			case "DELETE":
			{
				$request = $client->delete($url, array(), array(), array('query' => $obj));
				break;
			}
			CASE "PUT":
			{
				$request = $client->put($url, array(), array(), array('query' => $obj));
				break;
			}
		}
		if (isset($request)) {
			return $request->send()->json();
		}
	}
}