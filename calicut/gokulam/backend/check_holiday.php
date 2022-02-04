<?php

include_once("config.php");
//$curdate=  date('Y-m-d');
$curdate=  '2018-04-07';

$sql1 = "SELECT date FROM holiday_list where date = '$curdate'";
$result = mysql_query($sql1);
if ($result && mysql_num_rows($result) > 0)
    {
       echo 1;

    }
	
	else 
		
		{
			
			echo 0;
		}



?>