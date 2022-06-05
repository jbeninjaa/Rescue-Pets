<?php


Class Login extends Controller
{
	function index()
	{
		
		$data['page_title'] = "Login";
		$user = $this->loadModel("user");
 		
 		$gClient = new Google_client();
		$gClient -> setClientId("81384478440-4ll05iab1m1qm8rpnemslfkonhephpql.apps.googleusercontent.com");
		$gClient -> setClientSecret("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");
		$gClient -> setApplicationName("Rescue Pets");
		$gClient -> setRedirectUri("http://localhost/Rescue_Pets/public/login");

		$gClient -> addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
		$data['url'] = $gClient->createAuthUrl();

		if(isset($_POST['submit']))
 	 	{
 	 		$user->login($_POST);

 	 	}
 	 	if(isset($_GET['code']))
 	 	{
 	 		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
 	 		$gClient->setAccessToken($token);
 	 		$gauth = new Google_Service_Oauth2($gClient);
 	 		$google_info = $gauth->userinfo->get();
 	 		$email = $google_info->email;

 	 		$user->google_login($email);
 	 	}
 	 	
		$this->view("temp/login", $data); //controller class
	}


} 