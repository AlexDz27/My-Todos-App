<?php

namespace controllers;

use models\UserModel;

class BaseController {

	public $model;

	function __construct() {
		$this->model = new UserModel();
	}

	public function render404Page(): void {
		header('HTTP/1.1 404 Not Found');

		$this->mainRender('404.php');
	}

	public function redirectIfLogged($location): void {
		$isUserLogged = UserModel::isUserLogged();

		if ($isUserLogged) {
			header('Location: ' . $location);
		}
	}

	public function mainRender(string $fileName, array $vars = []): void {
		$isUserLogged = UserModel::isUserLogged();

		$this->render('layout.php');
		$this->render('header.php', ['isUserLogged' => $isUserLogged]);
		$this->render($fileName, $vars);
		$this->render('footer.php');
	}

	public function render(string $fileName, array $vars = []): void {
		$fileName = 'views/' . $fileName;
		$output = '';

		if (!file_exists($fileName)) {
			throw new \Exception('No views file found');
		}

		ob_start();
		extract($vars);
		require_once($fileName);

		$output = ob_get_clean();

		echo $output;
	}

}