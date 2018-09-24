<?php //require_once('init.php'); ?>
<?php 
	
	class User {
		public $user_id;
		public $firstname;
		public $lastname;
		public $username;
		public $password;
		public $confirm_pass;

		//function to check if key exists in an array
		public function key_available($key) {
			//this gives an assoc array of the properties in the class
			$user_object = get_object_vars($this);
			//checks if a key exists in an array 
			return array_key_exists($key, $user_object);
		}

		//loops through a database record
		public static function loop_through($user_record) {
			
			//create an instance to access the class
			$user_object = new User();

			//loop throught the record
			foreach ($user_record as $key => $value) {
				//check if a key exists
				if($user_object->key_available($key)) {
					//assign this key to the value that matches
					$user_object->$key = $value;
				}
			}
			return $user_object;
		}





		public static function find_by_query($sql) {
			global $database;

			$result = $database->query_result($sql);

			$fetched_result = [];

			while($row = mysqli_fetch_assoc($result)) {

				$fetched_result[] = self::loop_through($row);
			}
			return $fetched_result;
		}





		public static function create($firstname, $lastname, $username, $password, $confirm_pass) {
			global $database;

			$sql  = "INSERT INTO users (firstname, lastname, username, password, confirm_pass) ";
			$sql .= "VALUES ('$firstname', '$lastname', '$username', '$password', '$confirm_pass')";

			// if($database->query_result($sql)) {
			// 	$this->user_id = $database->last_id();
			// 	return true;
			// } else {
			// 	return false;
			// }

			$result = $database->query_result($sql);

			return $result;

		}

		public static function verify_user($username, $password) {

			global $database;

			$username = $database->escape_string($username);
			$password = $database->escape_string($password);

			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1" ;

			$result = self::find_by_query($sql);

			return !empty($result) ? array_shift($result) : false;

			//return $result;


		}

	}


 ?>