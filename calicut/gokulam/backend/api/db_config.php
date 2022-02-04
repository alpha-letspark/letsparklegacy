<?php
$db_host = "localhost"; //hostname
$db_user = "letspark"; // username
$db_password = "letspark123321"; // password
$db_name = "letspark"; //database name
$conn = mysql_connect($db_host, $db_user, $db_password );
mysql_select_db($db_name, $conn);

?>