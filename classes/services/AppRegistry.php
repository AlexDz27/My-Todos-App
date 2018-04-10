<?php

namespace services;

class AppRegistry {

	public static function setEnvironmentStatus($envStatus = 'dev'): void {
		switch ($envStatus) {
			case 'dev':
				ini_set('display_errors', 1);
				error_reporting(E_ALL);
				break;

			case 'prod':
				error_reporting(0);
				ini_set('display_errors', 0);
				break;
		}
	}

	public static function getDbParams(): array {
		$dbParams = require('config/dbParams.php');

		return $dbParams;
	}

	public static function getAppParams(): array {
		$appParams = require('config/appParams.php');

		return $appParams;
	}

	public static function getPageTitle(): string {
		return self::getAppParams()['pageTitle'];
	}

}