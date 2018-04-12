<?php

namespace controllers;

use models\UserModel;
use services\FormValidation;

class UserController extends BaseController {

	public $model;

	public function __construct() {
		parent::__construct();
		$this->model = new UserModel();
	}

	public function actionSignup(): void {
		$this->redirectIfLogged('/');

		$errors = [];

		$username = '';
		$email = '';
		$password = '';

		$isUserCreated = false;

		if (isset($_POST['submit-sign-up'])) {
			$username = FormValidation::sanitize($_POST['username']);
			$email = FormValidation::sanitize($_POST['email']);
			$password = FormValidation::sanitize($_POST['password']);

			$fields = [$username, $email, $password];

			if (!FormValidation::checkLength($username, 3)) {
				$errors[] = 'Username must be at least 3 symbols';
			}

			if (!FormValidation::checkLength($password, 3)) {
				$errors[] = 'Password must be at least 3 symbols';
			}

			if (!FormValidation::checkIfFieldsFilled($fields)) {
				$errors[] = 'Some fields are not filled out';
			}

			if (!FormValidation::checkEmail($email)) {
				$errors[] = 'Wrong email type. Try another one';
			}

			if ($this->model->checkEmailExists($email)) {
				$errors[] = 'A user with such an email already exists';
			}


			if (empty($errors)) {
				$isUserCreated = $this->model->signupUser($username, $email, $password);
			}
		}

		$this->mainRender('sign-up.php', ['username' => $username,
		'email' => $email, 'errors' => $errors, 'isUserCreated' => $isUserCreated]);
	}

	public function actionSignin(): void {
		$this->redirectIfLogged('/');

		$errors = [];

		$username = '';
		$password = '';


		if (isset($_POST['submit-sign-in'])) {
			$username = FormValidation::sanitize($_POST['username']);
			$password = FormValidation::sanitize($_POST['password']);

			$fields = [$username, $password];

			if (!FormValidation::checkLength($username, 3)) {
				$errors[] = 'Username must be at least 3 symbols';
			}

			if (!FormValidation::checkLength($password, 3)) {
				$errors[] = 'Password must be at least 3 symbols';
			}

			if (!FormValidation::checkIfFieldsFilled($fields)) {
				$errors[] = 'Some fields are not filled out';
			}

			$userId = $this->model->getUserId($username, $password);

			if (empty($errors)) {
				if (!$userId) {
					$errors[] = 'Wrong username or password. Try again';
				} else {
					// Everything is correct, the user exists and now can proceed to todos page
					$didUserLog = $this->model->authenticateUser($userId);

					$isTodoListCreated = $this->model->createEmptyUserTodos();
					var_dump($isTodoListCreated);

//					header('Location: /');
				}
			}
		}

		$this->mainRender('sign-in.php', ['username' => $username, 'errors' => $errors]);
	}

	public function actionProfile(): void {
		$isUserLogged = $this->model->isUserLogged();
		if (!$isUserLogged) {
			header('Location: /sign-in');
		}

		$userData = $this->model->getUserById($_SESSION['userId']);

		$this->mainRender('profile.php', ['userData' => $userData]);
	}

	public function actionLogout(): void {
		$this->model->logoutUser();
	}

	public function actionChangeUserData() {
		$result = null;

		$changedData = $_POST; // todo: '?? *default user data*'

		if ($changedData) {
			$result = $this->model->updateUserDataById($_SESSION['userId'], $changedData);
		}
	}

}