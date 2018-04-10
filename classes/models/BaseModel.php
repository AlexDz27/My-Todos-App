<?php

namespace models;

use services\DbConnect;

class BaseModel {

	protected $db;

	public function __construct() {
		$this->db = DbConnect::getConnection();
	}

}