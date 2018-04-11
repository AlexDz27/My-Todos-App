<?php

namespace controllers;


class PageController extends BaseController {

	public function actionContactsPage(): void {
		$this->mainRender('contacts.php');
	}

	public function actionAboutPage(): void {
		$this->mainRender('about.php');
	}

}