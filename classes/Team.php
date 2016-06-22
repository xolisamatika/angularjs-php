<?php
class Team {
	public $name;
	public $iso_code;
	public $players;
	public function __construct($name = ' ', $iso_code = '', $players = array()) {
		$this->name = $name;
		$this->iso_code = $iso_code;
		$this->players = $players;
	}
	public static function getAllTeams() {
		$sql = "SELECT * FROM teams ;";
		$teams = array ();
		$instance = DB_class::getInstance ();
		$connection = $instance->getConnection ();
		$result = $connection->query ( $sql );
		if ($result === false)
			echo "Error: " . $sql . "<br>" . $connection->error;
		
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
       			array_push ( $teams, new Team ( $row ["name"], $row ["iso_code"] ) ) ;
			}
		} else {
			echo "No teams found.";
		}
		
		return $teams;
	}
}
?>
