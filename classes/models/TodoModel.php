<?php

// todo: interface for todos

namespace models;


class TodoModel extends BaseModel {

	protected $userId;

	public function __construct() {
		parent::__construct();
		$this->userId = UserModel::getUserSessId();
	}

	// Можно брать тудусы по айди юзера даже (ну да, там будет джоин -> Nea pohody)

	public function getAllUserTodos() {
		$query = "SELECT id, todos FROM todos_lists WHERE user_id = :userId";
		// todo: add $this->userId

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

}