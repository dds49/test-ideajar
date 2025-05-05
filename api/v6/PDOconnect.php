<?php
	/**
	* Database Connection
	*/
	class PDOconnect {
		private $server = 'mysql5035.site4now.net';
		private $dbname = 'db_a1397e_ideajar';
		private $user = 'a1397e_ideajar';
		private $pass = 'shinji86';

		public function connect() {
			try {
				$conn = new PDO('mysql:host=' .$this->server .';dbname=' . $this->dbname, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch (Exception $e) {
				echo "Database Error: " . $e->getMessage();
			}
		}    
	}
?>