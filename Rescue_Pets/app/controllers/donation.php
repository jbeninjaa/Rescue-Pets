<?php

Class Donation extends Controller
{
	function index()

	{	
		
		
		$data['page_title'] = "Donation";
		$this->view("temp/donation", $data); //controller class
	}


} 