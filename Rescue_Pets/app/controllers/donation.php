<?php

Class Donation extends Controller
{
	function index()

	{	
		
		
		$data['page_title'] = "Donation";
		$data['first_name'] = $_SESSION['user_fname'];
		$data['last_name'] = $_SESSION['user_lname'];
		$this->view("temp/donation", $data); //controller class
	}


} 