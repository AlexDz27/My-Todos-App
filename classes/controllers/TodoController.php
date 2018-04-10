<?php

namespace controllers;

use models\TodoModel;
use models\UserModel;

class TodoController extends BaseController {

	/*public $model;

	function __construct() {
		$this->model = new ItemModel();
	}

	public function actionViewAllItems(): void {
		$items = $this->model->getAllItems();

		$this->mainRender('index.php', ['items' => $items]);
	}

	public function actionViewOneItem(): void {
		$item = $this->model->getOneItemById();

		if (!$item) { // If there is no item with such an id,
			$this->render404Page();
		} else {
			$this->mainRender('one_item.php', ['item' => $item]);
		}
	}

	public function actionAboutPage(): void {
		$this->mainRender('about.php');
	}

	public function actionContactsPage(): void {
		$this->mainRender('contacts.php');
	}*/

	public $todoModel;

	function __construct() {
		parent::__construct();
		$this->todoModel = new TodoModel();
	}

	public function actionViewAllTodos(): void {
//		$todos = $this->model->getAllItems();

//		$this->mainRender('index.php', ['todos' => $todos]);
		$userName = 'Guest';
		if (isset($_SESSION['userId'])) {
			$userName = $this->model->getUserById($_SESSION['userId'])['username'];
		}

		$isUserLogged = UserModel::isUserLogged();

		$this->mainRender('index.php', ['isUserLogged' => $isUserLogged, 'userName' => $userName]);
	}

}