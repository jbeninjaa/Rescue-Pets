<?php

Class Edit_profile extends Controller
{
	function index()
	{
		$data['page_title'] = "Edit Profile Info";
		$user = $this->loadModel("user");
		$isEmpty = isset($_GET['firstname']) && $_GET['lastname'] && $_GET['phone'];
		$data['first_name'] = $_SESSION['user_fname'];
		$data['last_name'] = $_SESSION['user_lname'];
		$data['phone_number'] = $_SESSION['user_phone'];

		if( $isEmpty && $_GET['firstname'] != '' &&  $_GET['lastname'] != '' &&  $_GET['phone'] != '' ){
			$arr['first_name'] = $_GET['firstname'];
			$arr['last_name'] =  $_GET['lastname'];
			$arr['phone_number'] = $_GET['phone'];
			$user->fill_user_info($_SESSION['user_name'], $arr);
			header("Location:". ROOT . "info");
		}
		else
		{
			$this->view("temp/edit_profile", $data);
			
		}



		

	}


} 