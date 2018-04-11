<?php

namespace models;


class UserModel extends BaseModel {

	public function getUserById($userId) {
		$query = "SELECT * FROM users WHERE id = :userId";

		$payload = $this->db->prepare($query);
		$payload->bindParam(':userId', $userId, \PDO::PARAM_INT);
		$payload->setFetchMode(\PDO::FETCH_ASSOC);
		$payload->execute();

		return $payload->fetch();
	}

	public function signupUser($username, $email, $password): bool {
		$query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$payload = $this->db->prepare($query);
		$payload->bindParam(':username', $username, \PDO::PARAM_STR);
		$payload->bindParam(':email', $email, \PDO::PARAM_STR);
		$payload->bindParam(':password', $hashedPassword, \PDO::PARAM_STR);

		return $payload->execute();
	}

	public function authenticateUser($userId) {
		$_SESSION['userId'] = $userId;
	}

	public function logoutUser(): void {
		unset($_SESSION['userId']);

		header('Location: /');
	}

	public static function isUserLogged() {
		$userSessId = self::getUserSessId();
		$isUserLogged = $userSessId ?? false;

		return $isUserLogged;
	}

	public static function getUserSessId() {
		return $_SESSION['userId'] ?? false;
	}

	public function getUserId($username, $password) {
		$userData = $this->getUserDataAfterSignin($username, $password);

		$result = $userData['id'] ?: false;
		return $result;
	}

	public function getUserDataAfterSignin($username, $password) {
		$userDataByUn = $this->getUserDataByUn($username);

		if (password_verify($password, $userDataByUn['password'])) {
			return $userDataByUn;
		} else {
			return false;
		}
	}

	public function getUserDataByUn($username) {
		$query = "SELECT * FROM users WHERE username = :username";

		$payload = $this->db->prepare($query);
		$payload->bindParam(':username', $username, \PDO::PARAM_STR);
		$payload->setFetchMode(\PDO::FETCH_ASSOC);
		$payload->execute();

		$userData = $payload->fetch();

		return $userData;
	}

	public function checkEmailExists($email) {
		$query = "SELECT COUNT(*) FROM users WHERE email = :email";

		$payload = $this->db->prepare($query);
		$payload->bindParam(':email', $email, \PDO::PARAM_STR);
		$payload->execute();

		return $payload->fetchColumn() ?: false;
	}

	public function updateUserDataById($userId, $changedData) {
		$query = "UPDATE users SET username = :newUsername, email = :newEmail WHERE id = :userId";

		$payload = $this->db->prepare($query);
		$payload->bindParam(':newUsername', $changedData['username'], \PDO::PARAM_STR);
		$payload->bindParam(':newEmail', $changedData['email'], \PDO::PARAM_STR);
		$payload->bindParam(':userId', $userId, \PDO::PARAM_INT);

		$payload->execute();

		return $payload;
	}

}