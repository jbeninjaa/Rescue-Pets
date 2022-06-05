<?php

Class Admin extends Controller
{
	function index()

	{	
		$data['page_title'] = "Admin";
		$user = $this->loadModel("user");
		
		if(is_array($user->display_requests())) 
		{		
			$data['table'] = $user->display_requests();
			$data['table_size'] = count($data['table']);
			 //controller clas
		}
			
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$user->remove_request($id);
			

		}else{
			
		}
		$this->view("temp/admin", $data); //controller class

	}


} 