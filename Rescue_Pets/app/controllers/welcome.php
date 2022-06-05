<?php

Class Welcome extends Controller
{
	function index()

	{	
		
		
		$data['page_title'] = "Welome";
		$this->view("temp/welcome", $data); //controller class
	}


} 