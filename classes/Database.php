<?php
class DB_class {
	// The database connection
	private static $instance = null;
	private $connection;
	private function __construct() {
		
		// Load configuration as an array. Use the actual location of your configuration file
		$config = parse_ini_file ( 'config.ini' );
		
		$this->connection = mysqli_connect ( $config ['hostname'], $config ['username'], $config ['password'], $config ['dbname'] );
	}
	public static function getInstance() {
		if (! self::$instance) {
			self::$instance = new DB_class ();
		}
		
		return self::$instance;
	}
	public function getConnection() {
		return $this->connection;
	}
}
?>
