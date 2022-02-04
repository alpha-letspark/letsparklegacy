<?php
$sql = mysql_connect("database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com","admin","letspark123321");
if(!$sql)
{
	echo "Connection Not Created";
}
$con = mysql_select_db("gokulam");
if(!$sql)
{
	echo "Database Not Connected";
}

?>