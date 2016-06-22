<?php
class User {
	private $id;
	public $username;
	private $password;
	public $emailAddress;
	private $role;
	private $created;
	private $modified;
	public function __construct($username = '', $password = '', $emailAddress = '', $role = 'user', $created = '', $modified = '') {
		$this->username = $username;
		$this->password = $password;
		$this->emailAddress = $emailAddress;
		$this->role = $role;
		$this->created = $created;
		$this->modified = $modified;
	}
	public function getUsername() {
		return $this->username;
	}
	public function setUsername($usename) {
		$this->username = $username;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	public function getEmaiAddress() {
		return $this->emailAddress;
	}
	public function setEmailAddress($emailAddress) {
		$this->emailAddress = $emailAddress;
	}
	public function getRole() {
		return $this->role;
	}
	public function getModified() {
		return $this->modified;
	}
	public function setModified($modified) {
		$this->modified = $modified;
	}
	public function getCreated() {
		return $this->created;
	}
	public function addUser() {
		$instance = DB_class::getInstance ();
		$connection = $instance->getConnection ();
		$sql = "INSERT INTO `users2` (`username`,`password`,`emailAddress`,`role`,`created`) VALUES ('" . $this->username . "','" . md5 ( $this->password ) . "','" . $this->emailAddress . "','" . $this->role . "', NOW())";
		$result = $connection->query ( $sql );
		if ($result === false)
			echo "Error: " . $sql . "<br>" . $connection->error;
		
		return $result;
	}
	public static function getUser($username) {
		$sql = "SELECT * FROM users2 WHERE username = '" . $username . "' ;";
		$user = null;
		$instance = DB_class::getInstance ();
		$connection = $instance->getConnection ();
		$result = $connection->query ( $sql );
		if ($result === false)
			echo "Error: " . $sql . "<br>" . $connection->error;
		
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$user = new User ( $row ["username"], $row ["password"], $row ["emailAddress"], $row ["role"], $row ["created"], $row ["modified"] );
			}
		} else {
			echo "User with " . $username . " not found.";
		}
		
		return $user;
	}
	public static function getAllUsers() {
		$sql = "SELECT * FROM users2 ;";
		$users = array ();
		$instance = DB_class::getInstance ();
		$connection = $instance->getConnection ();
		$result = $connection->query ( $sql );
		if ($result === false)
			echo "Error: " . $sql . "<br>" . $connection->error;
		
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				array_push ( $users, new User ( $row ["username"], $row ["password"], $row ["emailAddress"], $row ["role"], $row ["created"], $row ["modified"] ) );
			}
		} else {
			echo "No users found.";
		}
		
		return $users;
	}
	public function isAdmin() {
		if ($this->role == 'admin') {
			return true;
		}
		return false;
	}
}
?>
