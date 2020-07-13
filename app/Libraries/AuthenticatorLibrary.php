<?php 

namespace App\Libraries;

class AuthenticatorLibrary {

	public static function encodeToken($user, $pass) {

		return base64_encode($user . '|' . $pass);

	}

	public static function decodeToken($token) {

		$data = base64_decode($token);

		$dataArray = explode('|', $data);

		if (empty($dataArray)
			|| !array_key_exists(0, $dataArray)
			|| empty($dataArray[0])
			|| !array_key_exists(1, $dataArray)
			|| empty($dataArray[1])
			)
			return [ 'user' => '', 'pass' => '' ];

		return [

			'user' => $dataArray[0],
			'pass' => $dataArray[1]

		];

	}

}


?>