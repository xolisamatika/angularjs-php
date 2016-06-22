<?php
class Tournament {
	public $name;
	public $players_max;
	public $teams_max;
	public function __construct($name = ' ', $teams_max = 100, $players_max = 100) {
		$this->name = $name;
		$this->teams_max = $teams_max;
		$this->players_max = $players_max;
	}
	public static function getAllTournaments() {
		$sql = "SELECT * FROM tournaments ;";
		$tournaments = array ();
		$instance = DB_class::getInstance ();
		$connection = $instance->getConnection ();
		$result = $connection->query ( $sql );
		if ($result === false)
			echo "Error: " . $sql . "<br>" . $connection->error;
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				 array_push ( $tournaments, new Team ( $row ["name"], $row ["teams_max"] , $row ["players_max"] ) ) ;
			}
		} else {
			echo "No tournaments found.";
		}
		
		return $tournaments;
	}
}
?>
