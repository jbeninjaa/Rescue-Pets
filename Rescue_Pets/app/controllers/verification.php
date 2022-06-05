<?php

Class Verification extends Controller
{
	function index()
	{
		
		$data['page_title'] = "Verification";

		#VERIFIY EMAIL
		if(isset($_GET['vkey']))
		{
			

			$vkey = $_GET['vkey'];
		
			
			$user = $this->loadModel("user");
 	 		$user->verify_email($vkey);


		}
		#ERORR
		// else
		// {
	
		// 	die("Unauthorized access to this page.");
		// }

		$this->view("temp/verification", $data); //controller class
		
	}


} 