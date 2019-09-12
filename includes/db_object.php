<?php
use Carbon\Carbon;

class Db_object{
	protected static $db_table="users";
	

	public static function find_all(){
		
		return static::find_this_query("SELECT *FROM ". static::$db_table . " ORDER BY id DESC");



	}

	public static function findById($id){
		global $db;

		$the_result_array = static::find_this_query("SELECT *FROM ". static::$db_table ." WHERE id='$id'");

		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}
	
	public function mailFinder(){
		
		global $db;

		$today =  Carbon::now('Asia/Dhaka')->format('Y-m-d');

		$res = static::find_this_query("SELECT *FROM ". static::$db_table . " WHERE alert_date='$today'");

		return $res;


	}





	public static function find_this_query($sql){
		global $db;


		$result_set = $db->query($sql);
		$the_object_array = array();

		while($row = mysqli_fetch_array($result_set)){
			 $the_object_array[] = static::instantation($row);
		}
		

	

		return $the_object_array;


	}

	public static  function instantation($row){

	
		$calling_class = get_called_class();
		$userObj = new $calling_class;



		foreach ($row as $the_attribute => $value) {
			if($userObj->has_the_attribute($the_attribute)){
				$userObj->$the_attribute = $value ;
				
			}
		}
		
		return $userObj;
	}

	public function has_the_attribute($attr){
		
		$object_properties = get_object_vars($this);
		

		return  array_key_exists($attr,$object_properties);
	}

	protected function properties(){
		$properties = array();

		foreach (static::$db_table_fields as $db_field) {
			if(property_exists($this, $db_field)){
				$properties[$db_field] = $this->$db_field;
			}
		}

		 $property = $this->clean_properties($properties);

		 return $property;
	}

	protected function clean_properties($properties){
		global $db;

		$clean_properties = array();

		foreach ($properties as $key => $value) {
		 	$clean_properties[$key] = $db->escape_string($value);
		 } 


		 return $clean_properties;
	}

	public function create(){
		global $db;

		$properties = $this->properties();

		$sql= "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
		$sql .= " VALUES ('".  implode("','", array_values($properties)) ."')";

		
		
		
	
		if($db->query($sql)){
			$this->id = $db->the_insert_id();
			return true;
		}
		else{
			return false;
		}



	}
	public function update(){
		global $db;

		$properties = $this->properties();



		$properties_pair = array();


		foreach ($properties as $key => $value) {
			
			$properties_pair[] = "{$key}='{$value}'";
		}

		
		$sql = "UPDATE ". static::$db_table  . " SET ";
		$sql .= implode(",",$properties_pair);
		$sql .= " WHERE id=" .$db->escape_string($this->id);
		
	
		
		

		$db->query($sql);
		return (mysqli_affected_rows($db->connection)==1) ? true:false;


	}



	public static function delete($id){
		global $db;

		$db->escape_string($id);

		$sql = "DELETE FROM ". static::$db_table ." WHERE id='$id'";


		$db->query($sql);
		return (mysqli_affected_rows($db->connection)==1) ? true:false;

		
	}	



}





?>