<?php $this->view("temp/header", $data); ?>
<!-- MAIN -->
<main role="main">
<!-- Content -->
<article>
	
	<div class="limiter">
		
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method = "post">
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input j" >
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input " >
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Type your email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="Rptpassword" placeholder="Confirm Password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

			
				
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					<?php check_message()?> <!-- error handler -->
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type = "submit" name ="submit">
								Sign Up
							</button>
						</div>
					</div>

		

		
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
</article>
</main>

<?php $this->view("temp/footer", $data); ?>