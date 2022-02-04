<?php

include("config.php");
session_start();
//echo $_SESSION['name'];
if(!isset($_SESSION['user'])){
	header('location: index.php');
}

$shopowner=$_POST['shopowner'];
//$shopownerid=$_POST['shopownerid'];
echo $shopowner;
//echo $shopownerid;
 
 ?>