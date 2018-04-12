<?php

namespace controllers;

use models\TodoModel;
use models\UserModel;

class TodoController extends BaseController {

	public $todoModel;

	public function __construct() {
		parent::__construct();
		$this->todoModel = new TodoModel();
	}

	public function actionViewAllTodos(): void {
		$todosData = $this->todoModel->getAllUserTodos();

		$todosId = $todosData[0];
		$todos = $todosData[1];

		$userName = 'Guest';
		if (isset($_SESSION['userId'])) {
			$userName = $this->model->getUserById($_SESSION['userId'])['username'];
		}

		$isUserLogged = UserModel::isUserLogged();

		$this->mainRender('index.php', ['isUserLogged' => $isUserLogged, 'userName' => $userName, 'todos' => $todos, 'todosId' => $todosId]);
	}

	public function actionNewTodos() {
		$changedTodos = $_POST['changedTodos'];

		$result = $this->todoModel->updateUserTodos($changedTodos);
	}

}