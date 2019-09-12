<?php




class Mail{

	public $mail_array;
	public $subject;
	public $message;
	public $headers = 'MIME-Version: 1.0'. "\r\n" .'Content-type: text/html; charset=UTF-8' . "\r\n" .  'From: info@bdsourceltd.com';

	

	public function mailer(){
	

		foreach ($this->mail_array as $mail) {
			$mail=	mail($mail,$this->subject,$this->message,$this->headers);
		}
		
		return $mail;



		


	}



}

$mail = new Mail();














?>