<?php

Class Admin extends Controller
{
	function index()

	{	
		$data['page_title'] = "Admin";
		$user = $this->loadModel("user");
		$order = 'id';

		if(isset($_GET['order'])){
			$order = $_GET['order'];
		}
		
		if(is_array($user->display_requests($order))) 
		{		
			$data['table'] = $user->display_requests($order);
			$data['table_size'] = count($data['table']);
			
		}
			
		if(isset($_GET['id']) && $_GET['action'] == 'delete')
		{
			$id = $_GET['id'];
			$user->remove_request($id);
			header("Location:". ROOT . "admin");

		}elseif(isset($_GET['id']) && $_GET['action'] == 'verify'){
			$id = $_GET['id'];
			
			$user->verify_request($id);
			header("Location:". ROOT . "admin");

		}
		$this->view("temp/admin", $data); //controller class


	}


} 