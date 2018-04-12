<?php

// todo: interface for todos

namespace models;


class TodoModel extends BaseModel {

	protected $userId;

	public function __construct() {
		parent::__construct();
		$this->userId = UserModel::getUserSessId();
	}

	public function getAllUserTodos() {
		$query = "SELECT id, todos FROM todos_lists WHERE user_id = :userId";

		$payload = $this->db->prepare($query);
		$payload->bindParam(':userId', $this->userId, \PDO::PARAM_INT);
		$payload->setFetchMode(\PDO::FETCH_ASSOC);
		$payload->execute();

		$payload = $payload->fetch();

		$payloadArr = [];

		$payloadArr[] = $payload['id'];
		$payloadArr[] = json_decode($payload['todos']);

		return $payloadArr;
	}

	public function updateUserTodos($changedTodosJSON) {
		$query = "UPDATE todos_lists SET todos = :changedTodos WHERE user_id = :userId";
//		$userSessId = UserModel::getUserSessId();

		$payload = $this->db->prepare($query);
		$payload->bindParam(':changedTodos', $changedTodosJSON, \PDO::PARAM_STR);
		$payload->bindParam(':userId', $this->userId, \PDO::PARAM_INT);
		$payload->execute();

		return $payload;
	}

}