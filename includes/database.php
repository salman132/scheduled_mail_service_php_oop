<?php
	require_once('init.php');

	class Database{
		public $connection;

		function __construct(){
			$this->open_db_connection();
		}


		public function open_db_connection(){

			$this->connection = new mysqli (DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if($this->connection->connect_errno){
				die("Databse Connection Established Failed ". $this->connection->connect_error);
			}
		}

		public function query($sql){
			$result = $this->connection->query($sql);

			$this->confirm($result);

			return $result;

		}

		public function confirm($result){
			if(!$result){
				die('Query Died');
			}
		}

		public function escape_string($sql){
			$escaped = mysqli_real_escape_string($this->connection,$sql);

			return $escaped;
		}

		public function the_insert_id(){

			return mysqli_insert_id($this->connection);
		}





	}



$db = new Database();

	



?>