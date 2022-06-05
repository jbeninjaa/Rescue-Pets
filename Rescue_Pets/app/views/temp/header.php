<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$data['page_title'] . " | ". WEBSITE_TITLE?></title>
    <link rel="stylesheet" href="<?=ASSETS?>resc/css/components.css">
    <link rel="stylesheet" href="<?=ASSETS?>resc/css/icons.css">
    <link rel="stylesheet" href="<?=ASSETS?>resc/css/responsee.css">
    <link rel="stylesheet" href="<?=ASSETS?>resc/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?=ASSETS?>resc/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="<?=ASSETS?>resc/css/lightcase.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="<?=ASSETS?>resc/css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,400,600,900&subset=latin-ext" rel="stylesheet"> 
    <script type="text/javascript" src="<?=ASSETS?>resc/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?=ASSETS?>resc/js/jquery-ui.min.js"></script> 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- LOGIN STYLE -->
      <link rel="icon" type="image/png" href="<?=ASSETS?>login/images/icons/favicon.ico"/>
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/<?=ASSETS?>login/vendor/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/fonts/iconic/css/material-design-iconic-font.min.css">
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/vendor/animate/animate.css">
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/vendor/css-hamburgers/hamburgers.min.css">
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/vendor/animsition/css/animsition.min.css">
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/vendor/select2/select2.min.css">  
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/vendor/daterangepicker/daterangepicker.css">
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/css/util.css">
      <link rel="stylesheet" type="text/css" href="<?=ASSETS?>login/css/main.css">    
  </head>

  <body class="size-1140">
  	<!-- PREMIUM FEATURES BUTTON -->
  	<!-- <a target="_blank" class="hide-s" href="../template/minimalista-premium-responsive-business-template/" style="position:fixed;top:120px;right:-14px;z-index:10;"><img src="<?=ASSETS?>resc/img/premium-features.png" alt=""></a> -->
    <div id="page-wrapper">
      <!-- HEADER -->
      <header role="banner" class="position-absolute margin-top-30 margin-m-top-0 margin-s-top-0">    
        <!-- Top Navigation -->
        <nav class="background-transparent background-transparent-hightlight full-width sticky">
          <div class="s-12 l-2">
            <a href="home" class="logo">
              <!-- Logo version before sticky nav -->
              <img class="logo-before" src="<?=ASSETS?>resc/img/logo/logo-1.png" alt="">
              <!-- Logo version after sticky nav -->
              <img class="logo-after" src="<?=ASSETS?>resc/img/logo/logo-2.png" alt="">
            </a>
          </div>
          <div class="s-12 l-10">
            <div class="top-nav right">
              <p class="nav-text"></p>
              <ul class="right chevron">
                <li><a href="<?=ROOT?>home">Home</a></li>
                <li><a href="<?=ROOT?>about">About Us</a></li>             
                <li><a href="<?=ROOT?>contact">Contact</a></li>
                <?php if(isset($_SESSION['user_name'])):?> 
                  <li><a href="<?=ROOT?>profile"> <?php echo $_SESSION['user_name']?></a></li>
                  <li><a href="<?=ROOT?>logout">Logout</a></li>
                <?php else: ?>
                  <li><a href="<?=ROOT?>login">Login</a></li>
                  <li><a href="<?=ROOT?>signup">Sign Up</a></li>
                <?php endif ?>
                
           

              </ul>
            </div>
          </div>  
        </nav>
        
      </header>
      