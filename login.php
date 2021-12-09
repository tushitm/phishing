<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/global/config.php';

$ip = $_SERVER['REMOTE_ADDR'];


		if(isset($_POST['username']) && isset($_POST['password'])) {

			// Check if the user exists
			$query = $handler->prepare("SELECT * FROM admin WHERE username = ?");
			$query->execute(array($_POST['username']));
			$count = $query->rowCount() == 1;
			if($count) {
				// The user has been found, so we check the password
				$details = $query->fetch(PDO::FETCH_ASSOC);
				if(md5($_POST['password'] . $details['salt']) == $details['password']) {
					$updateIP = $handler->prepare("UPDATE admin SET ip = ? WHERE username = ?");
			    $updateIP->execute(array($ip, $_POST['username']));
					$_SESSION['username'] = $details['username'];
				} else {
					// Incorrect password
					$msg = "Incorrect password.";
				}
			} else {
				// The username does not exist
					$msg = "That username does not exist!";
			}
		}
if($ip == $yourIP && !isset($_SESSION['username'])) {
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
</head>

<body>
    <div class="wrapper">
      <div class="content">
          <div class="container-fluid">
              <div class="row"><br /><br />
                <div class="col-md-4 col-md-offset-4">
                    <div class="card">
                        <div class="card-content">
													<form action="login?next=<?php echo htmlentities($_GET['next']); ?>" method="post">
														<div class="row">
															<div class="col-md-12">
																<h2>Log in</h2>
																<? echo "<h4>". $msg ."</h4>";?>
																<div class="form-group label-floating">
																	<label class="control-label">Username</label>
																	<input type="text" name="username" id="username" class="form-control">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group label-floating">
																	<label class="control-label">Password</label>
																	<input type="password" name="password" id="password" class="form-control">
																</div>
															</div>
														</div>
															<button type="submit" class="btn btn-primary pull-right">Log in</button>
															<div class="clearfix"></div>
													</form>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>










<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/global/footer.php';


} else {
  header("Location: http://" . $siteLink . "");
}



?>
