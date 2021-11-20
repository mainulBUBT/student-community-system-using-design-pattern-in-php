<?php 

// define('DB_SERVER', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'scs');

// $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

// if($mysqli == false) {
//     die("database connection failed" . $mysqli->connect_error);
// }





class Database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "scs";

	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// Constructor
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
		// echo "Database connect";
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . $this->_connection->connect_error,
				 E_USER_ERROR);
		}
	}

	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }

	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}

$db = Database::getInstance();
$mysqli = $db->getConnection();



?>