<?php

namespace Abishekrsrikaanth\MongohqApi\MongoHQ;
use Illuminate\Support\Facades\Config;

class Users extends Executor
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


	/**
	 * Creates a New user on the given DB
	 * @param      $db
	 * @param      $username
	 * @param      $password
	 * @param bool $readOnly
	 *
	 * @return mixed
	 */
	public function create($db, $username, $password, $readOnly = false)
	{
		$hash_password = md5($username . ":mongo:" . $password);

		return $this->send('databases/' . $db . '/collections/system.users/documents', array(
			'_apikey'  => $this->_key,
			'document' => array(
				'user'     => $username,
				'pwd'      => $hash_password,
				'readonly' => $readOnly
			),
			'safe'     => true
		), "POST");
	}
}