<?php

use controllers\TodoController;
use controllers\UserController;
use controllers\PageController;

return [
//	'items/([0-9]+)' => ['ctrlName' => ItemController::class, 'actionName' => 'actionViewOneItem'],
	'contacts' => ['ctrlName' => PageController::class, 'actionName' => 'actionContactsPage'],
	'about' => ['ctrlName' => PageController::class, 'actionName' => 'actionAboutPage'],
	'sign-up' => ['ctrlName' => UserController::class, 'actionName' => 'actionSignup'],
	'sign-in' => ['ctrlName' => UserController::class, 'actionName' => 'actionSignin'],
	'profile/change' => ['ctrlName' => UserController::class, 'actionName' => 'actionChangeUserData'],
	'profile' => ['ctrlName' => UserController::class, 'actionName' => 'actionProfile'],
	'logout' => ['ctrlName' => UserController::class, 'actionName' => 'actionLogout'],
	'newTodos' => [ 'ctrlName' => TodoController::class, 'actionName' => 'actionNewTodos'],
	'' => [ 'ctrlName' => TodoController::class, 'actionName' => 'actionViewAllTodos']
];