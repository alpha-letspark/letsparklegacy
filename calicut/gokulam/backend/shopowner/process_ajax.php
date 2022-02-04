<?php
  mysql_connect('database-1.c4yvruc72su1.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321') or die('Could not connect: ' . mysql_error());
  mysql_select_db('gokulam') or die('Could not select database');
   

  $placeId = $_POST['placeId'];

  $query = "SELECT * from employee_list";
  $result = mysql_query($query) or die('Query failed: ' . mysql_error());
  while ($row = mysql_fetch_assoc($result)) {
    if ($placeId == $row['name']){
      echo json_encode($row);
    }
  }
  
?>