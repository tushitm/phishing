<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/global/header.php';

$ip = $_SERVER['REMOTE_ADDR'];

if($ip == $yourIP && isset($_SESSION['username'])) { //lockout to only admins


if(isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['pass2'])) {

	$username = trim($_POST['username']);
	$password = $_POST['pass'];
	$confirm = $_POST['pass2'];
	$salt = uniqid(mt_rand(), true);
	$hashedPassword = md5($password . $salt);
	if(strlen($username) >= 4 && strlen($username) <= 12 && ctype_alnum(str_replace(" ","",$username))) { // Minimum 4, maximum 12 characters for username
    $ntSQL = "SELECT * from admin where username = :username";
		$nametaken = $handler->prepare($ntSQL);
		$nametaken->bindParam(':username', $username);
		$nametaken->execute();
    $ntCheck = $nametaken->rowCount() == 0;
		if($ntCheck) {
  		if(strlen($password) >= 8 && strlen($password) <= 32) { // Minimum 8, maximum 32 characters for password
  			if($password == $confirm) { // Do the passwords match?
  					$reg = $handler->prepare("INSERT INTO admin (username, password, salt) VALUES (?, ?, ?)");
  					$reg->execute(array($username, $hashedPassword, $salt));
  					$msg = "" . $username . " has been successfully created.";
  			} else {
  				$msg = "The passwords did not match.";
  			}
  		} else {
  			$msg = "The password must be between 8 and 32 characters.";
  		}
		} else {
			$msg = "That username is already taken!";
		}
	} else {
		$msg = "The username must be between 4 and 12 characters and contain only letters, numbers, and/or spaces.";
	}
}







?>


      <div class="content">
          <div class="container-fluid">
              <div class="row"><br /><br />
                <div class="col-md-6 col-md-offset-3">
                    <div class="card">
                        <div class="card-content">
													<form action="manage-users" method="post">
														<div class="row">
															<div class="col-md-12">
																<h2>Add an admin account</h2>
																<? echo "<h4>". $msg ."</h4>";?>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group label-floating">
																	<label class="control-label">Username</label>
																	<input type="text" name="username" id="username" class="form-control" maxlength="12">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group label-floating">
																	<label class="control-label">Password</label>
																	<input type="password" name="pass" id="pass" class="form-control" maxlength="32">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group label-floating">
																	<label class="control-label">Confirm password</label>
																	<input type="password" name="pass2" id="pass2" class="form-control" maxlength="32">
																</div>
															</div>
														</div>
															<button type="submit" class="btn btn-success pull-right">Create</button>
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
