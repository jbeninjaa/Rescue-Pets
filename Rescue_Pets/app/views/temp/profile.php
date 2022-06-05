<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$data['page_title'] . " | ". WEBSITE_TITLE?></title>
  <link rel="stylesheet" href="<?=ASSETS?>resc/css/styles.css">

</head>
<body>
  <!-- Menu -->
  <header>
   <a href="#">
      <img class="lazyload logo" src="<?=ASSETS?>resc/img/logo/logo-1.png"alt="logo"/>
    </a> 


    <nav>
      <ul>
        <!-- y button -->
        <!-- <li id="button-one"><a href="#">about</a></li> -->
        <!-- x button -->
        <!-- <li id="button-two"><a href="#">projects</a></li> -->
        <!-- a button -->

        <li id="button-three"><a href="<?=ROOT?>home">Home</a></li>
        <!-- b button -->
        <li id="button-four"><a href="<?=ROOT?>logout">Logout</a></li>
      </ul>
    </nav>
  </header>

  <div class="center">

    <div class = "center">
      <h1>Level <?php echo $data['level'] ?></h1>
      <progress value = "<?php echo $data['xp'] ?>" max = "3"/>
    </div>
   
    <form class = "element" method = "post">
      <div class="button_pos" method = "post">
        <a href="<?=ROOT?>profile">
          <button class="button"  name="adoption">
            <span class="button__text">Adopt</span>
            <span class="button__icon">
              <ion-icon name="cloud-download-outline"></ion-icon>
            </span>
          </button>
        </a>
      </div>

      <div class="button_pos" method = "post">
        <a href="<?=ROOT?>profile">
          <button  class="button" name = "donation">
            <span class="button__text">Donate</span>
            <span class="button__icon">
              <ion-icon name="cloud-download-outline"></ion-icon>
            </span>
          </button>
        </a>
      </div>
      

      <div class="button_pos" method = "post">
        <a href="<?=ROOT?>profile">
          <button  class="button" name = "volunteer">
            <span class="button__text">Volunteer</span>
            <span class="button__icon">
              <ion-icon name="cloud-download-outline"></ion-icon>
            </span>
          </button>
        </a>
      </div>
    </form>

    <div class = "element">
      <img class="lazyload logo" src="<?php echo $_SESSION['img_dir'] ;?>"alt="logo" height="500" width="500" />
    </div>


    

  </div>

  <!-- <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script> -->
</body>
</html>

<!-- <a href="<?=ROOT?>profile"> -->