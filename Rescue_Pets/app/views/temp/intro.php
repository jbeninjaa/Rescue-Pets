<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$data['page_title'] . " | ". WEBSITE_TITLE?></title>
	<link rel="stylesheet" href="<?=ASSETS?>resc/css/styles.css">

</head>
<body>
	<div class="center">
		<h1>Hello <?php echo $_SESSION['user_name']?></h1>
		<p>Please choose an avatar for your pofile</p>
	</div>
	<form class="center" action method="post">
		<img src="<?=ASSETS?>resc/img/avatars/Cat1.png" height="300" width="300"></img>
		
		<img src="<?=ASSETS?>resc/img/avatars/Dog1.png" height="300" width="300"></img>
		
		<img src="<?=ASSETS?>resc/img/avatars/Rabbit1.png" height="300" width="300"></img>
		<div  class="pic-center">	
			<a href="<?=ROOT?>profile"><button name="Cat">Cat</button></a>
			<a href="<?=ROOT?>profile"><button name="Dog">Dog</button></a>
			<a href="<?=ROOT?>profile"><button name="Rabbit">Rabbit</button></a>
		</div>
	</form>
</body>
</html>

<!-- <a href="<?=ROOT?>profile"> -->