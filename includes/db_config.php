<?php 
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'login');

	class Database {
		public $db;



		public function __construct() {

			$this->start_db();

		}


		public function start_db() {

			$this->db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

			if($this->db->connect_errno) {

				die ('Database connection failed!! '. $this->db->connect_error);

			}

		}


		public function confirm_query($result) {

			if(!$result) {

				die("Database Query Failed!! ". $this->db->connect_error);
			}
		} 


		public function query_result($query){

			$result = $this->db->query($query);
			$this->confirm_query($result);

			return $result;

		}


		public function escape_string($string) {

			$escaped_string = $this->db->real_escape_string($string);

			return $escaped_string;
		}

		public function last_id() {

			return $this->db->insert_id;
		}







	}

	$database = new Database();

 ?>