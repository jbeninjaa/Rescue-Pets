<?php

Class Signup extends Controller
{
	function index()
	{	
		$data['page_title'] = "Sign Up";

		$_SESSION['error'] = "";
		if(isset($_POST['submit']))
		{
			$user = $this->loadModel("user");

			$username_exists = $user->username_exist($_POST['username']);
			$email_exists = $user->email_exist($_POST['email']);
			$password_match = $user->password_match($_POST['password'], $_POST['Rptpassword']);
			$validate_password = $user->validate_password($_POST['password']);

			
			if($username_exists){
				$_SESSION['error'] = "Username is already taken";

			}elseif($email_exists)
			{	
				$_SESSION['error'] = "Email is already taken";
			}
			elseif(!$validate_password)
			{
				$_SESSION['error'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
				
			}
			elseif(!$password_match)
			{
				$_SESSION['error'] = "Password does not match";
			 }else
			{
				$user->signup($_POST);
			}
		}
		$this->view("temp/signup", $data); //controller class
	}
} 