
<?php
require "google-api/vendor/autoload.php";
$gClient = new Google_client();
$gClient -> setClientId("81384478440-4ll05iab1m1qm8rpnemslfkonhephpql.apps.googleusercontent.com");
$gClient -> setClientSecret("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");
$gClient -> setApplicationName("Rescue Ptes");
$gClient -> setRedirectUri("http://localhost/Rescue_Pets/public/assets/google");

$gClient -> addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
$login_url = $gClient->createAuthUrl();



