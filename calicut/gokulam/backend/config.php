<?php
$mysql_hostname = "database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com";
$mysql_user = "admin";
$mysql_password = "letspark123321";
$mysql_database = "gokulam";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

?>

