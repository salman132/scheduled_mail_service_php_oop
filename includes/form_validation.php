<?php


class Form_Validation{
	public $form_key;
	

	public function csrf_token(){
		
		return '<input type="hidden" name="__token" value="'.$this->checked() .'"  >';
	

	}
	private function checked(){
		if(isset($_SESSION['token'])){
			$token = $_SESSION['token'];

			return $token;
		}
		if(!isset($_SESSION['token'])){

			$token = $this->generate_key();

			return $token;
		}
	}

	private function generate_key(){
		$ip = $_SERVER['REMOTE_ADDR'];
		$num = rand(1,1000);

		$token = md5($ip.$num);
		$_SESSION['token'] = $token;

		return $token;
		
		
	}





}


$form = new Form_Validation();







?>