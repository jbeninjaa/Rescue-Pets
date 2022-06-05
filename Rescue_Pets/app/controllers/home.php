<?php

Class Home extends Controller
{
	function index()

	{	

		#Google Login
		$gClient = new Google_client();
		$gClient -> setClientId("81384478440-4ll05iab1m1qm8rpnemslfkonhephpql.apps.googleusercontent.com");
		$gClient -> setClientSecret("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");
		$gClient -> setApplicationName("Rescue Pets");
		$gClient -> setRedirectUri("http://localhost/Rescue_Pets/public/assets/google");
		$gClient -> addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
	
		if(isset($_GET['code']))
		{
			echo($_GET['code']);
			$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
			// show($token);
			$gClient->setAccessToken($token);

			$gauth = new Google_Service_Oauth2($gClient->getClient());
			$email = $gauth->email;
			

		}else{
		
		}
		
		$data['page_title'] = "Home";
		$this->view("temp/index", $data); //controller class
	}


} 