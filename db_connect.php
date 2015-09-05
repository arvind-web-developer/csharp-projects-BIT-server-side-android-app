<?php
	/**
	* A class file to connect to database
	*/
	class DB_CONNECT {
		
		//Global link
		private $link;
		
		//Get
		public function getlink() {
		    return $this->link;
		}
		
		// constructor
		function __construct() {
		// connecting to database
		$this->connect();
		}
		
		// destructor
		function __destruct() {
		// closing db connection
		$this->close();
		}
	
		/**
		* Function to connect with database
		*/
		function connect() {
			// import database connection variables
			require_once __DIR__ . '/db_config.php';
			// Connecting to mysql database
			$this->link = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die($mysqli->connect_error);
			// Selecting database
			$db = mysqli_select_db($this->link, DB_DATABASE) or die($mysqli->error);
			// returning connection cursor
			//return $this->link;
		}
		
		/**
		* Function to close db connection
		*/
		function close() {
			// closing db connection
			mysqli_close($this->getlink());
		}
	}
?>