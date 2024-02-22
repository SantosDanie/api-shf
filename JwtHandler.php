<?php
// This is JwtHandler.php
require __DIR__ . "/vendor/autoload.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHandler {
	protected $secret;
	protected $issuedAt;
	protected $expire;

	function __construct() {
		date_default_timezone_set('Asia/Kolkata');
		$this->issuedAt	= time();
		$this->expire	= $this->issuedAt + 3600;
		$this->secret	= "secret_key";
	}

	public function encode($iss, $data) {
		$token = array(
			"iss"	=> $iss,
			"aud"	=> $iss,
			"iat"	=> $this->issuedAt,
			"exp"	=> $this->expire,
			"data"	=> $data
		);

		return JWT::encode($token, $this->secret, 'HS256');
	}

	public function decode($token) {
		try {
			$decode = JWT::decode($token, new Key($this->secret, 'HS256'));
			return $decode->data;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}