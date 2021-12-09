<?php
//EDIT THESE SETTINGS
$siteName = "YourSite";
$yourIP = "YourIP"; //this is most important. this is how you access /login/ to enter your admin panel!!!


//DB HOST SETTINGS
$dbhost = "YourHost"; //db host url/ip/whatever; you should know what you're doing here..
$dbname = "YourDatabaseName"; //db name; not the table, the db name.
$dbuser = "YourDatabaseUsername"; //db username to access ur db table
$dbpass = "YourDatabaseUsernamePassword"; //db pass that corresponds to db username above



//do not mess with below

try {
  $handler = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  // set PDO error mode to exception
  $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die();
}

if(session_status() == PHP_SESSION_NONE) {
  session_name("XP");
  session_start();
}

if(isset($_SESSION['username'])) {
    $u = $handler->prepare("SELECT * FROM admin");
    $u->execute();
    $myU = $u->fetch(PDO::FETCH_OBJ);
}


if(isset($_SESSION['username'])) {
  $exists = $u->rowCount() == 1;
}

$siteLink = "$_SERVER[HTTP_HOST]"; //do not edit, auto detection of site url



?>
