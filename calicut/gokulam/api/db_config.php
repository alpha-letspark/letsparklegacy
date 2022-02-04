<?php
$db_host = "database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com"; //hostname
$db_user = "admin"; // username
$db_password = "letspark123321"; // password
$db_name = "gokulam"; //database name
$conn = mysql_connect($db_host, $db_user, $db_password );
mysql_select_db($db_name, $conn);

?>