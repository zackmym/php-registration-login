<?php 

	class Session {
		private $logged_in = false;
		public $id;

		public function __construct() {

			session_start();
			$this->check_login();

		}

		public function is_logged_in() {
			return $this->logged_in;
		}


		public function check_login() {
					//just a variable u assign to session
			if(isset($_SESSION['id'])) {

				$this->id = $_SESSION['id'];

				$this->logged_in = true;

	
			} else {

				unset($this->id);

				$this->logged_in = false;

			}
		}

		public function login($user) {

			if($user) {
											//user object
				$this->id = $_SESSION['id'] = $user->user_id;
				$this->logged_in = true;
			}			

		}

		public function logout() {
			unset($this->id);
			unset($_SESSION['id']);
			$this->logged_in = false;

		}
	}

	$session = new Session();

 ?>