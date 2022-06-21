<?php

Class Profile extends Controller
{
	function index()
	{
		
		$data['page_title'] = "Profile";
		$user = $this->loadModel("user");
		

		// $data['img_dir'] = $img_dir[];

		if( isset($_GET['avatar']) && $_GET['avatar'] == 'Cat' ){
 	 		$user->update_intro($_SESSION['user_name']);
 	 		$_SESSION['img_dir'] = ASSETS."resc/img/avatars/Cat1.png";
 	 		$user->assign_avatar("Cat", $_SESSION['user_name']);
		}elseif( isset($_GET['avatar']) && $_GET['avatar'] == 'Dog' )
		{
			$user->update_intro($_SESSION['user_name']);
			$_SESSION['img_dir'] = ASSETS."resc/img/avatars/Dog1.png";
			$user->assign_avatar("Dog", $_SESSION['user_name']);
		}elseif( isset($_GET['avatar']) && $_GET['avatar'] == 'Rabbit' )
		{
			$user->update_intro($_SESSION['user_name']);
			$_SESSION['img_dir'] = ASSETS."resc/img/avatars/Rabbit1.png";
			$user->assign_avatar("Rabbit", $_SESSION['user_name']);
		}
		$avatar = $user->avatar($_SESSION['user_name']); 
		$data['level'] = $user->level($_SESSION['user_name']); 
		$data['xp'] = $user->xp($_SESSION['user_name']); 
		$_SESSION['img_dir'] = ASSETS."resc/img/avatars/".$avatar .$data['level'].".png";


		if($user->check_intro($_SESSION['user_name']))
			#First time logging in
		{	

			$this->view("temp/intro", $data); //controller class

		}else{
			$isEmpty = isset($_GET['firstname']) && $_GET['lastname'] && $_GET['phone'];
			// Set User Information
			if($isEmpty && $_GET['firstname'] != '' &&  $_GET['lastname'] != '' &&  $_GET['phone'] != ''  ){
				$arr['first_name'] = $_GET['firstname'];
				$arr['last_name'] =  $_GET['lastname'];
				$arr['phone_number'] = $_GET['phone'];
				$user->fill_user_info($_SESSION['user_name'], $arr);
				header("Location:". ROOT . "profile");
			}

			// Set Request Details
			$details = [];
			$isEmpty = isset($_GET['avatar']) && isset($_GET['inquiry']);
			if(isset($_GET['avatar']))
			{
				$arr['animal'] = $_GET['avatar'];
				$arr['inquiry'] = $_GET['inquiry'];

				$result = $user->request_details('adopt', $arr);

				$user->update_request($_SESSION['user_name'], 'adopt');
				$user->insert_request($_SESSION['user_name'], $result);
				
				if($_GET['avatar'] == "cat")
				{
					echo "<script language=\"javascript\">
						window.open(\"https://aklananimalrescue.com/cat-adoption/\", \"_blank\");
					</script>";
				}elseif($_GET['avatar'] == "dog"){
					echo "<script language=\"javascript\">
						window.open(\"https://aklananimalrescue.com/dog-adoption/\", \"_blank\");
					</script>";
				}


				// header("Location:". ROOT . "profile");
		
			}elseif(isset($_GET['donation']) && $_GET['donation'] != '')
			{
				$arr['amount'] = $_GET['donation'];
				$arr['mod'] = $_GET['mod'];
				$arr['inquiry'] = $_GET['inquiry'];

				$result = $user->request_details('donate', $arr);
				$user->update_request($_SESSION['user_name'], 'donate');
				$user->insert_request($_SESSION['user_name'], $result);
				
				if($_GET['mod'] == "Paypal")
				{
					echo "<script language=\"javascript\">
						window.open(\"https://www.paypal.com/paypalme/aarrc\", \"_blank\");
					</script>";
				}elseif($_GET['mod'] == "Bank Transfer" or $_GET['mod'] == "Gcash"){
					echo "<script language=\"javascript\">
						window.open(\"https://aklananimalrescue.com/donations/#donate\", \"_blank\");
					</script>";
				}
				// header("Location:". ROOT . "profile");

			}elseif(isset($_GET['tasks']) && $_GET['tasks'])
			{
				$arr['task'] = $_GET['tasks'];
				$arr['inquiry'] = $_GET['inquiry'];

				$result = $user->request_details('volunteer', $arr);
				$user->update_request($_SESSION['user_name'], 'volunteer');
				$user->insert_request($_SESSION['user_name'], $result);
				echo "<script language=\"javascript\">
						window.open(\"https://aklananimalrescue.com/volunteering/\", \"_blank\");
					</script>";
				// header("Location:". ROOT . "profile");
			}

			if(isset($_POST['adoption']))
			{
				header("Location:". ROOT . "adopt");
			}
			elseif(isset($_POST['donation']))
			{
				header("Location:". ROOT . "donation");
			}
			elseif(isset($_POST['volunteer']))
			{
				header("Location:". ROOT . "volunteer");
			}
			
	
			$data['first_name'] = $_SESSION['user_fname'];
			$data['last_name'] = $_SESSION['user_lname'];
			$this->view("temp/profile", $data);	
		}	
	}


} 