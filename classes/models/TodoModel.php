<?php

namespace models;

use services\Router;


class TodoModel extends BaseModel {

	/*public function getAllItems(): array {
		$query = "SELECT * FROM `items` LIMIT 5";
		$payload = $this->db->query($query);
		$payload->setFetchMode(\PDO::FETCH_ASSOC);

		$items = $payload->fetchAll();

		return $items;
	}

	public function getOneItemById() {
		$userRequestURI = Router::getUri();
		$itemId = explode('/', $userRequestURI)[1];

		$query = "SELECT * FROM `items` WHERE id = :itemId";

		$payload = $this->db->prepare($query);
		$payload->bindParam(':itemId', $itemId, \PDO::PARAM_INT);
		$payload->setFetchMode(\PDO::FETCH_ASSOC);
		$payload->execute();

		$item = $payload->fetch();

		return $item; // can be either array (item fetched) or false if not fetched
	}*/

}