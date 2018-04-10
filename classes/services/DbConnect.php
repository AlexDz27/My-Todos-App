<?php

namespace services;

class DbConnect {

	public static function getConnection() {
		$dsn = 'mysql:host=' . AppRegistry::getDbParams()['host'] .
		';dbname=' . AppRegistry::getDbParams()['dbname'];
		$db = new \PDO($dsn, AppRegistry::getDbParams()['username'], AppRegistry::getDbParams()['password']);
		$db->exec('set names utf8');

		return $db;
	}

}