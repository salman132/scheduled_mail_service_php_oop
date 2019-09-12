<?php

	class Photo extends Db_object{
		protected static $db_table = "photos";
		protected static $db_table_fields = array('id','title','description','filename','type','size');
		public $id;
		public $title;
		public $description;
		public $filename;
		public $type;
		public $size;


		public $temp_path;
		public $upload_directory = "images";
		public $errors = array();
		
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

			if(empty($file) || !$file || !is_array($file)){
				$this->errors[]= 'There is no file uploaded';
				return false;
			}
			elseif ($file['error'] !=0) {
				
				$this->errors[]= $this->upload_errors['error'];
				return false;
			}
			else{
				$this->filename = basename($file['name']);
				$this->temp_path = $file['temp_name'];
				$this->type = $file['type'];
				$this->size = $file['size'];		
			}



		}


	}



?>