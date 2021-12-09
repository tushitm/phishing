<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/global/config.php';

session_destroy();
session_unset();
header('Location: http://'. $siteLink .'');

?>
