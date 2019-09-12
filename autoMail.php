<?php
require_once('includes/init.php');
use Carbon\Carbon;

class AutoMail{
	public $today;
	public $pd_name;
	public $qty;
	public $ship_date;

	function __construct(){
		 $this->Finder();
		 
		 


		 
		 	
		 
		
		
	}

	public function Finder(){
		$store = new Store();
		$mail = array();
		

		$res = $store->mailFinder();
		foreach ($res as $value) {
			$mail[]= $value->buying_house_email;
			$mail[]= $value->factory_md_email;
			$mail[]= $value->factory_gm_email;
			$mail[] = $value->buyer_house_email;
			$mail[] = $value->md_house_email;
			$this->pd_name = $value->item;
			$this->qty = $value->qty;
			$this->ship_date = $value->ship_date;



			$send_mail = new Mail();

	        $send_mail->mail_array = $mail;
	        $send_mail->subject = "Den Source BD | Shipment Date";
	        $send_mail->message = "<h3>Hello,</h3><p>We are felling happy to let you know that your Product <strong>". $this->pd_name ." (Qty: ". $this->qty .") </strong>  is ready 
	                  for Shipment. Shipment date is ". $this->ship_date ." 

	          </p>,<h5>Thank You,</h5><h5>Den Source BD</h5>";

	         $send_mail->mailer();



			
		}


		
	}
}

$auto = new AutoMail();




?>