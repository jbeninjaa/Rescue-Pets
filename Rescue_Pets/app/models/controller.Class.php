<?php
	Class Connect extends PDO
	{
		public function __construct(){
			parent::__construc("mysql:host=localhost;dbname=rescue_pets_db", 'root', "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}

		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


	}

	Class Control {
		// insert data in the database

		function insertData($data)
		{
			$db = new Connect;
			return $data['avatar'];//for now
		}
	}
?>