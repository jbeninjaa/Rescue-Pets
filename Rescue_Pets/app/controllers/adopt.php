<?php

Class Adopt extends Controller
{
	function index()

	{	
		
		
		$data['page_title'] = "Adopt";
		 //controller class
		$data['first_name'] = $_SESSION['user_fname'];
		$data['last_name'] = $_SESSION['user_lname'];

		if( isset($_GET['firstname'])){
			$this->view("temp/adopt_thanks", $data);
			unset($_GET['firstname']);
		}else{
			$this->view("temp/adopt", $data);
			
		}
	}


} 