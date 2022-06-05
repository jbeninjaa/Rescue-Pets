<?php

Class About extends Controller
{
	function index()
	{
		$data['page_title'] = "About Us";
		$this->view("temp/about-us", $data); //controller class
	
	}

}