<?php

/*set your website title*/

define('WEBSITE_TITLE', "Rescue Pets");

/*set database variables*/

define('DB_TYPE','mysql');
define('DB_NAME','rescue_pets_db'); //database name
define('DB_USER','root'); //user name
define('DB_PASS',''); //password 
define('DB_HOST','localhost'); // host name

/*protocal type http or https*/
define('PROTOCAL','http');

/*root and asset paths*/

$path = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/core", "public", $path));   // path to the public folder
define('ASSETS', str_replace("app/core", "public/assets", $path)); // path to the public/assets folder

/*set to true to allow error reporting
set to false when you upload online to stop error reporting*/

define('DEBUG',true); // set to true, it will show errors, fals = no errors shown -> for deployment

if(DEBUG)
{
	ini_set("display_errors",1);
}else{
	ini_set("display_errors",0);
}

