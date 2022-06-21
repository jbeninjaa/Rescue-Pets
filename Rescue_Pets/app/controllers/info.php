<?php

Class Info extends Controller
{
	function index()
	{
		$data['page_title'] = "User Information";
		$user = $this->loadModel("user");
		$data['first_name'] = $_SESSION['user_fname'];
		$data['last_name'] = $_SESSION['user_lname'];
		$this->view("temp/info", $data);

	}


} 