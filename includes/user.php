<?php


class User extends Db_object{

	protected static $db_table = "users";
	protected static $db_table_fields = array('name','email','password','is_admin');
	public $id;
	public $name;
	public $email;
	public $password;
	public $is_admin;


	public static function verify_user($email,$password){
		global $db;

		$email= $db->escape_string($email);
		$pass = $db->escape_string($password);

		$pass = bcrypt($pass);



		$sql = "SELECT * FROM ".self::$db_table ." WHERE ";
		$sql .= "email='{$email}'";

		$sql .= " AND password='{$pass}'";
		$sql .= " LIMIT 1"; 
		


		$the_result_array = self::find_this_query($sql);

		
		


		
		return !empty($the_result_array) ? array_shift($the_result_array) : false;


	}




}



$user = new User();















?>