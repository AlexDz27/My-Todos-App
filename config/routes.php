<?php

use controllers\TodoController;
use controllers\UserController;

return [
//	'items/([0-9]+)' => ['ctrlName' => ItemController::class, 'actionName' => 'actionViewOneItem'],
	'sign-up' => ['ctrlName' => UserController::class, 'actionName' => 'actionSignup'],
	'sign-in' => ['ctrlName' => UserController::class, 'actionName' => 'actionSignin'],
	'profile/change' => ['ctrlName' => UserController::class, 'actionName' => 'actionChangeUserData'],
	'profile' => ['ctrlName' => UserController::class, 'actionName' => 'actionProfile'],
	'logout' => ['ctrlName' => UserController::class, 'actionName' => 'actionLogout'],
	'' => [ 'ctrlName' => TodoController::class, 'actionName' => 'actionViewAllTodos']
];