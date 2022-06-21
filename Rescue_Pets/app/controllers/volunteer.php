<?php

Class Volunteer extends Controller
{
	function index()

	{	
		
		
		$data['page_title'] = "volunteer";
		$data['first_name'] = $_SESSION['user_fname'];
		$data['last_name'] = $_SESSION['user_lname'];
		$this->view("temp/volunteer", $data); //controller class
	}


} 