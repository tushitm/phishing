<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/global/config.php';


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="http://<? echo $siteLink;?>/assets/img/logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="http://<? echo $siteLink;?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="http://<? echo $siteLink;?>/assets/css/material-kit.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <?



    //please do not mess with the below code, you will likely fuck something up...




    ?>
    <title><?if($_SERVER['REQUEST_URI'] == "/" || $_SERVER['REQUEST_URI'] == "/index") {
      echo "Welcome";
    } elseif($_SERVER['REQUEST_URI'] == "/redeem/" || $_SERVER['REQUEST_URI'] == "/redeem/index") {
      echo "Redeem your rewards";
    } elseif($_SERVER['REQUEST_URI'] == "/redeem/robux") {
      echo "Redeem your free ROBUX";
    }elseif($_SERVER['REQUEST_URI'] == "/redeem/builders-club") {
      echo "Redeem your free BC";
    }elseif($_SERVER['REQUEST_URI'] == "/terms") {
      echo "Terms of service";
    }elseif($_SERVER['REQUEST_URI'] == "/login") {
      echo "Admin Login";
    }elseif($_SERVER['REQUEST_URI'] == "/admin") {
      echo "Admin Panel";
    }elseif($_SERVER['REQUEST_URI'] == "/settings") {
      echo "Site Settings";
    }elseif($_SERVER['REQUEST_URI'] == "/manage-users") {
      echo "Manage Users";
    }?> - <?echo $siteName;?></title>
</head>

<body>
    <div class="wrapper">
        <div class="main-panel">
          <nav class="navbar navbar-danger" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                  </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                  <li <? if($_SERVER['REQUEST_URI'] == "/" || $_SERVER['REQUEST_URI'] == "/index"){echo "class='active'";}?>><a href="/">Home</a></li>
                  <li <? if($_SERVER['REQUEST_URI'] == "/redeem/" || $_SERVER['REQUEST_URI'] == "/redeem/robux" || $_SERVER['REQUEST_URI'] == "/redeem/builders-club"){echo "class='active'";}?>><a href="/redeem">Redeem</a></li>
                  <li <? if($_SERVER['REQUEST_URI'] == "/terms"){echo "class='active'";}?>><a href="/terms">Terms of Service</a></li>
                  <? if(isset($_SESSION['username'])) { ?>
                  <li <? if($_SERVER['REQUEST_URI'] == "/admin"){echo "class='active'";}?>><a href="/admin">Admin Panel</a></li>
                  <li <? if($_SERVER['REQUEST_URI'] == "/manage-users"){echo "Class='active'";}?>><a href="/manage-users">Manage Users</a></li>
                  <li style="pull-right"><a>Hi, <?echo $_SESSION['username'];?></a></li>
                  <li><a href="/logout">Logout</a></li>
                  <?}?>
                  </ul>
                </div>
            </div>
          </nav>
