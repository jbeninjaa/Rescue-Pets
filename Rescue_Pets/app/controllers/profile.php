<?php

Class Profile extends Controller
{
	function index()
	{
		
		$data['page_title'] = "Profile";
		$user = $this->loadModel("user");
		

		// $data['img_dir'] = $img_dir[];

		if(isset($_POST['Cat'])){
 	 		$user->update_intro($_SESSION['user_name']);
 	 		$_SESSION['img_dir'] = ASSETS."resc/img/avatars/Cat1.png";
 	 		$user->assign_avatar("Cat", $_SESSION['user_name']);
		}elseif(isset($_POST['Dog']))
		{
			$user->update_intro($_SESSION['user_name']);
			$_SESSION['img_dir'] = ASSETS."resc/img/avatars/Dog1.png";
			$user->assign_avatar("Dog", $_SESSION['user_name']);
		}elseif(isset($_POST['Rabbit']))
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
		{
			#First time logging in
			$this->view("temp/intro", $data); //controller class
		}else{
			if(isset($_POST['adoption']))
			{
				$this->view("temp/adopt", $data);
				$user->update_request($_SESSION['user_name'], 'adopt');
			
			}
			elseif(isset($_POST['donation']))
			{
				$this->view("temp/donation", $data);
				$user->update_request($_SESSION['user_name'], 'donate');
			
			}
			elseif(isset($_POST['volunteer']))
			{
				$this->view("temp/volunteer", $data);
				$user->update_request($_SESSION['user_name'], 'volunteer');
			
			}

			

			$user->insert_request($_SESSION['user_name']);
			$this->view("temp/profile", $data);

			
		}	
	}


} 