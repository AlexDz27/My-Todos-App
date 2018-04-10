<?php

namespace services;

use controllers\BaseController;

class Router {

	private $routes = [];


	public function __construct() {
		$routesPath = ROOT . '/config/routes.php';

		$this->routes = require($routesPath);
	}

	public function initialize() {
		$userRequestURI = self::getUri();

		foreach ($this->routes as $route => $routeHandlers) {
			if (preg_match("~$route~", $userRequestURI)) {

				$ctrlName = $routeHandlers['ctrlName'];
				$actionName = $routeHandlers['actionName'];
				// @TODO: remake parameters after / (slash) system // todo: @ r if not needed (подвать апликейшн)
				// Handle 404 Page Not Found requests
				if (($userRequestURI !== '') && ($actionName === 'actionViewAllTodos')) {
					$ctrl = new BaseController();
					$ctrl->render404Page();

					break;
				}

				$ctrl = new $ctrlName;
				$ctrl->$actionName();

				break;
			}
		}
	}

	public static function getUri() {
		return trim($_SERVER['REQUEST_URI'], '/');
	}

}