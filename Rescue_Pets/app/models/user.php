<?php 

Class User 
{

	function login($POST)
	{
		$DB = new Database();

		$_SESSION['error'] = "";
		if(isset($POST['username']) && isset($POST['password']))
		{

			$hash = "";
			$verified = "";
			$username = $POST['username'];
			$password = $POST['password'];


			$arr['username'] = $username;


			$query = "select * from users where username = :username limit 1";
			$data = $DB->read($query,$arr);


			if(is_array($data))
			{
				$hash = $data[0]->password;
				$verified = $data[0]->verified;
			}

			

			if(password_verify($password, $hash))
			{
				#Password is Correct
				if($verified == 1)
				{
					#Account is verified
					#Login user
					$_SESSION['user_name'] = $data[0]->username;
					$_SESSION['user_url'] = $data[0]->url_address;
					header("Location:". ROOT . "home");
					die;

	 				
				}
				#admin login
				elseif($verified == 11)
				{
	 				$_SESSION['user_name'] = $data[0]->username;
					$_SESSION['user_url'] = $data[0]->url_address;
					header("Location:". ROOT . "admin");
					die;

				}else{	
					#Account is not yet verified
					$_SESSION['error'] = "Account is not yet verified, please verifiy your account through your email.";
					
				}

			}else{
				$_SESSION['error'] = "Username or Password is Invalid";
			}

		}

	}

	function google_login($email)
	{
		$DB =   new Database();
		$arr['email'] = $email;
		$query = "select * from users where email =:email limit 1";
		$data = $DB->read($query,$arr);
		
		if(is_array($data))
		{
			$_SESSION['user_name'] = $data[0]->username;
			$_SESSION['user_url'] = $data[0]->url_address;
			header("Location:". ROOT . "home");
			die;

		}
	}

	function signup($POST)
	{

		$DB = new Database();


		$_SESSION['error'] = "";
		if( ($POST['username'] != "" && $POST['password'] != "" && $POST['email'] != "") && ( isset($POST['username'])  && isset($POST['password'])  && isset($POST['email']) ) )
		{
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$Rptpassword = $_POST['Rptpassword'];

			$password = password_hash($password, PASSWORD_DEFAULT);

	    	//Generetae Verification Key
	    	$vkey = md5(time().$username);

			$arr['username'] = $username;
			$arr['password'] = $password;
			$arr['email'] = $email;
			$arr['vkey'] = $vkey;
			$arr['url_address'] = get_random_string_max(60);
			$arr['date'] = date("Y-m-d H:i:s");

			$query = "insert into users (username,password,email,vkey,url_address,date) values (:username,:password,:email,:vkey,:url_address,:date)";
			$data = $DB->write($query,$arr);
			if($data)
			{
				#send email for verification
				$to = $email;
				$subject = "Email Verification";
				$message = "<a href='http://localhost/Rescue_Pets/public/verification?vkey=$vkey'>Register Account</a>";
				$headers = 'From: jveeen.lupera@gmail.com';
				$headers .= "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
				mail($to, $subject, $message, $headers);
				header("Location:". ROOT . "welcome");
				die;
			}

		}
		else
		{

			$_SESSION['error'] = "Empty Input: All Fields must be filled up";
		}
	}

	function check_logged_in()
	{

		$DB = new Database();

		if(isset($_SESSION['user_url']))
		{

			$arr['user_url'] = $_SESSION['user_url'];

			$query = "select * from users where url_address = :user_url limit 1";
	
			if(is_array($data))
			{
				//logged in
 				$_SESSION['user_name'] = $data[0]->username;
				$_SESSION['user_url'] = $data[0]->url_address;

				return true;
			}
		}

		return false;

	}

	function logout()
	{
		
		unset($_SESSION['user_name']);
		unset($_SESSION['user_url']);

		header("Location:". ROOT . "login");
		die;
	}



	function invalidEmail($email) {
	    $result;
	    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
	        $result = true;
	    }
	    else{
	        $result = false;
	    }
    	return $result;
	}

	public function verify_email($vkey)
	{
		$DB = new Database();
 
		$arr['vkey'] = $vkey;
		$arr['verified'] = 0;
		

		$query = "select verified, vkey from users where vkey = :vkey && verified = :verified   limit 1";

		$data = $DB->read($query,$arr);
	
		if(is_array($data))
		{
			#verify email

			$arr['verified'] = 1;
			$query = "update users set verified = :verified where vkey = :vkey limit 1";
			$update = $DB->write($query,$arr);

		}
		else
		{
			#SOMETHING WANT WRONG
			// die("something went wrong");
		}
	}

	#Checks if username exists in the database
	function username_exist($username)
	{
		$DB = new Database();

		$arr['username'] = $username; 
		$query = "select username from users where username =:username limit 1";
		$data = $DB->read($query,$arr);

		if(is_array($data))
		{
			#username  exist in the database
			return true;
		}else{
			#username does not exist in the database
			return false;
		}
	}

	#Checks if email exists in the database
	function email_exist($email)
	{
		$DB = new Database();

		$arr['email'] = $email; 
		$query = "select email from users where email =:email limit 1";
		$data = $DB->read($query,$arr);

		if(is_array($data))
		{
			#username  exist in the database
			return true;
		}else{
			#username does not exist in the database
			return false;
		}
	}

	#Check if password matches 
	function password_match($password, $RptPassword)
	{
		$DB = new Database();
		if($password == $RptPassword)
		{
			return True;
		}else{
			return false;
		}
	}

	function validate_password($password)
	{
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
		{
			#Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character. 
			return False;
		}else{
			return True;
		}
	}

	function check_intro($username)
	{
		$DB = new Database();

		// $arr['intro'] = 0;
		$arr['username'] = $username;
		$query = "select intro from users where username =:username limit 1";

		$data = $DB->read($query, $arr);

		if(is_array($data)){
			if($data[0]->intro == 0){
				return true;
			}
		}else{
			return false;
		}
	}

	public function update_intro($username)
	{
		$DB = new Database();
 
		$arr['username'] = $username;
		$arr['intro'] = 0;
		

		$query = "select username, intro from users where username = :username && intro = :intro   limit 1";

		$data = $DB->read($query,$arr);
	
		if(is_array($data))
		{
			#verify email

			$arr['intro'] = 1;
			$query = "update users set intro = :intro where username = :username limit 1";
			$update = $DB->write($query,$arr);

		}
		else
		{
			#SOMETHING WANT WRONG
			die("something went wrong");
		}
	}

	function display_data($username){
		$DB = new Database();
		$arr['username'] = $username;

		$query = "select * from users where username = :username    limit 1";

		$data = $DB->read($query,$arr);
		if(is_array($data))
		{
			show($data);
			echo sizeof($data);
		}

	}

	function check_request(){
		$DB = new Database();
	
		$arr['adopt'] = 1;
		$arr['volunteer'] = 1;
		$arr['donate'] = 1;
		
		$query = "select * from users where adopt = :adopt or volunteer =:volunteer or donate =:donate limit 1";
	
		$data = $DB->read($query, $arr);
		show($data);
		$arr2 = [];
		if(is_array($data))
		{
			$arr2['username'] = $data[0]->username;
			$arr2['email'] = $data[0]->email;
			if($data[0]->adopt == 1)
			{
				array_push($arr2, 'adopt');
			}
			if($data[0]->donate == 1)
			{
				array_push($arr2, 'donate');
			}
			 	if($data[0]->volunteer == 1)
			{
				array_push($arr2, 'volunteer');
			}
		}
		return $arr2;
	}

	public function update_request($username, $request)
	{
		$DB = new Database();
 
		$arr['username'] = $username;

		

		$query = "select $request from users where username =:username   limit 1";

		$data = $DB->read($query,$arr);
	
		if(is_array($data))
		{
			#verify email
			
			$query = "update users set $request = 1 where username = :username limit 1";
			$update = $DB->write($query,$arr);
			

		}
		else
		{
			#SOMETHING WANT WRONG
			// die("something went wrong");
		}
	}

	public function display_requests()
	{
		$DB = new Database();
		$arr['username'] = 'username';
		$arr['email'] = 'email';
		$arr['request'] = 'request';

		$query = "select * from requests";
		$data = $DB->read($query);

		if(is_array($data))
		{
			return $data;
		}
		else{
			return $data;
		}
	}

	public function insert_request(){
		$DB = new Database();

		$arr['adopt'] = 1;
		$arr['volunteer'] = 1;
		$arr['donate'] = 1;

		

		$query = "select * from users where adopt = :adopt or volunteer =:volunteer or donate =:donate";
		$data = $DB->read($query, $arr);
		if(is_array($data))
		{
					$len = count($data);

		$result = [];
		for ($x = 0; $x <= $len -1; $x++) {
			if($data[$x]->adopt == 1)
			{		
				
				$arr2['username'] = $data[$x]->username;
				$arr2['email'] = $data[$x]->email;
				$arr2['request'] = "adopt";
				array_push($result, $arr2);
				
				

			}
			if($data[$x]->donate == 1)
			{
				$arr2['username'] = $data[$x]->username;
				$arr2['email'] = $data[$x]->email;
				$arr2['request'] = "donate";
				array_push($result, $arr2);
				
				
				
			}
			if($data[$x]->volunteer == 1)
			{
				$arr2['username'] = $data[$x]->username;
				$arr2['email'] = $data[$x]->email;
				$arr2['request'] = "volunteer";
				array_push($result, $arr2);
				
			}
		}
		$len_result = count($result);
		
		for($x = 0; $x <= $len_result -1; $x++)
		{
			$arr3['username']= $result[$x]['username'];
			$arr3['email']= $result[$x]['email'];
			$arr3['request']= $result[$x]['request'];
			
			$query = "insert into requests (username,email,request) values (:username,:email,:request)";
			$data = $DB->write($query,$arr3);

		}


		}

	}
	public function remove_request($id)
	{
		$DB = new Database();
		$arr['id'] = $id;

		$query = "select * from requests where id = :id limit 1";
		$data = $DB->read($query, $arr);

		if(is_array($data)){
			$write["username"] = $data[0]->username;
			$request = $data[0]->request;

			$query = "update users set $request = 0 where username = :username limit 1";
			$update = $DB->write($query,$write);

			$query = "DELETE FROM requests WHERE id =:id limit 1";
			$data = $DB->write($query,$arr);

			$this->update_xp($write['username']);
		}	

	}

	function assign_avatar($avatar, $username){
		$DB = new Database();
		$arr['username'] = $username;


		$query = "select * from users where username =:username   limit 1";

		$data = $DB->read($query,$arr);
		
		if(is_array($data))
		{	
			$arr['avatar'] = $avatar;

			$query = "update users set avatar = :avatar where username = :username limit 1";
			$update = $DB->write($query,$arr);		
		
		// $data = $DB->write($query,$arr);
		}
		
	}

	function avatar($username){
		$DB = new Database();
		$arr['username'] = $username;

		$query = "select * from users where username =:username  limit 1";
		$data = $DB->read($query,$arr);

		if(is_array($data))
		{
			return $data[0]->avatar;
		}
	}

	function level($username){
		$DB = new Database();
		$arr['username'] = $username;

		$query = "select * from users where username =:username  limit 1";
		$data = $DB->read($query,$arr);

		if(is_array($data))
		{
			return $data[0]->level;
		}
	}

	function xp($username){
		$DB = new Database();
		$arr['username'] = $username;

		$query = "select * from users where username =:username  limit 1";
		$data = $DB->read($query,$arr);

		if(is_array($data))
		{
			return $data[0]->xp;
		}
	}

	function update_xp($username)
	{
		$DB = new Database();
 
		$arr['username'] = $username;

		

		$query = "select * from users where username =:username   limit 1";

		$data = $DB->read($query,$arr);
		
	
		if(is_array($data))
		{
			if($data[0]->xp == 3){
				$query = "update users set xp = 0, level = level+1 where username=:username";
				$data = $DB->write($query,$arr);
			}else{
				$query = "update users set xp = xp+1 where username=:username";
				$data = $DB->write($query,$arr);
			}

		}
		else
		{
			header("Location:". ROOT . "admin");
		}
	}
}

