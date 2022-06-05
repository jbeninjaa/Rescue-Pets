<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=ASSETS?>resc/css/styles.css">
  <title><?=$data['page_title'] . " | ". WEBSITE_TITLE?></title>
</head>
<body>

  <header>
   <a href="#">
      <img class="lazyload logo" src="<?=ASSETS?>resc/img/logo/logo-1.png"alt="logo"/>
    </a> 
    <h1>Admin Panel</h1>

    <nav>
      <ul>
        <!--  -->
        <li id="button-four"><a href="<?=ROOT?>logout">Logout</a></li>
      </ul>
    </nav>
  </header>
  
  <div class ="table-header"><h1>Requests</h1></div>
  <table class ="table-header" border= "1" cellspacing="0" cellpadding = "10">
    <tr>
      <th>I.D</th>
      <th>Username</th>
      <th>Email</th>
      <th>Request</th>
      <th>Confirm</th>
    </tr>
  <?php 
    if( isset($data['table_size']) and $data['table_size'] > 0)
    {
      $sn=0;

      while($sn<$data['table_size'])
      {?>
        <tr>
          <td><?php echo $data['table'][$sn]->id; ?> </td>
          <td><?php echo $data['table'][$sn]->username; ?> </td>
          <td><?php echo $data['table'][$sn]->email; ?> </td>
          <td><?php echo $data['table'][$sn]->request; ?> </td>
          <td><a href="<?=ROOT?>admin?id=<?php echo $data['table'][$sn]->id; ?>"><button <?php echo "name = $sn"?> >Verify Request</button></a></td>

          
        </tr>
        <?php
        $sn++;
      }
    }
    else
    {  ?>
      <tr>
       <td colspan="8">No data found</td>
      </tr>
    <?php } ?>
  </table>



     


</body>
</html>