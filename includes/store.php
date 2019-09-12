<?php

class Store extends Db_object{
	protected static $db_table = "store";
	protected static $db_table_fields = array('id','buying_house_email','factory_md_email','factory_gm_email','buyer_house_email','md_house_email','item','pd_no','knitting','ap_date','qty','dyeing','sewing','cutting','finishing','ship_date','inline_date','final_date','eta','alert_date','shipment_status','image','created_at');

	public $id;
	public $buying_house_email;
	public $factory_md_email;
	public $factory_gm_email;
	public $buyer_house_email;
	public $md_house_email;
	public $item;
	public $pd_no;
	public $knitting;
	public $ap_date;
	public $qty;
	public $dyeing;
	public $sewing;
	public $cutting;
	public $finishing;
	public $ship_date;
	public $inline_date;
	public $final_date;
	public $eta;
	public $alert_date;
	public $shipment_status;
	public $image;
	public $created_at;



	public $errors = array();
	public $msg;


		public $upload_errors = array(
			UPLOAD_ERR_OK => 'There is no error',
	        UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
	        UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
	        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.',
	        UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
	        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.',
	        UPLOAD_ERR_CANT_WRITE => 'Cannot write to target directory Please fix CHMOD.',
	        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload',

		);

		public function set_file($file){
			$imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
			$check = getimagesize($file['tmp_name']);
			

			if(empty($file) || !$file || !is_array($file)){

				$this->errors[]= 'There is no file uploaded';
				return false;
			}
		
			elseif($check == FALSE){
				$this->errors[] = "This is not an Image";
				return false;
			}
			elseif($file['size'] >556228){
				$this->errors[] ="This file is greater than 10MB";
				return false;
			}
			else{

				$temp_name = $file['tmp_name'];
				$the_file = time().$file['name'];
				$directory = "images/store/";
				if(move_uploaded_file($temp_name, $directory . "/" .$the_file)){

					return $directory.$the_file;

				}else{
					$the_error = $_FILES['file_upload']['error'];

					return $this->msg = $this->upload_errors[$the_error];
				}

			}
		}


	
}


$store = new Store();















?>