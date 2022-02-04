<?php
$hostdb = "database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com";  // MySQl host
   $userdb = "admin";  // MySQL username
   $passdb = "letspark123321";  // MySQL password
   $namedb = "gokulam";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = mysqli_connect($hostdb, $userdb, $passdb, $namedb);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if (!$dbhandle) {
  	exit("There was an error with your connection: ".mysqli_connect_error());
   }
   
?>