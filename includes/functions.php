<?php

	function classAutoloader($class){

		$class = strtolower($class);

		$the_path = "includes/{$class}.php";

		if(is_file($the_path) && !class_exists($class)){
			include_once $the_path; 
		}



	}

	function redirect($location){
		header("Location: {$location}");
	}
	function bcrypt($pass){
		$salt = md5("$'1@!xY&.>?W'");

		return md5($salt.$pass.$salt);
	}

	spl_autoload_register('classAutoloader');



?>