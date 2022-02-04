<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");

// Get user id
$card_number = $_GET['card_number'];
$curdate=  date('Y-m-d');

  $q1 =  mysql_query("SELECT `type`  FROM `card_details` WHERE card_number = '$card_number'") or die(mysql_error());
    while($row2 = mysql_fetch_array($q1)){
    
     $type = $row2['type'];
    // $valid_from = $row2['valid_from'];
    }

//$valid_from  = '2020-02-22';
$sql = "SELECT * from employee_allocation where card_number = '$card_number'  and valid_to >='$curdate' and current_status = 1";
$select = mysql_query($sql);
$status = array();
while($data = mysql_fetch_assoc($select)) {
$status[] = $data;
}

if(mysql_num_rows($select) == '1'){
$data = array("status" => "1", "msg" => "Card Valid" , "data" => $status , "card_type" => $type );
} 



$sql1 = "SELECT * from employee_allocation where card_number = '$card_number' and valid_to <'$curdate' and current_status = 1";
$select1 = mysql_query($sql1);
$status1 = array();
while($data1 = mysql_fetch_assoc($select1)) {
$status1[] = $data1;
}

if (mysql_num_rows($select1) == '1' )  { 

$data = array("status" => "0", "msg" => "Not Valid" , "data" => $status1 , "card_type" => $type );
}


$sql2 = "SELECT * from employee_allocation where card_number = '$card_number' and valid_to >='$curdate'";
$select2 = mysql_query($sql2);
$status2 = array();
while($data1 = mysql_fetch_assoc($select2)) {
$status2[] = $data2;
}

if (mysql_num_rows($select2) == '0' )  { 

$data = array("status" => "0", "msg" => "Not Valid or expired" , "data" => $status1 , "card_type" => $type );
}


$sql3 = "SELECT * from details_transaction where card_number = '$card_number' and DATE_FORMAT(entry_time,'%Y-%m-%d') ='$curdate' and status =  0 and card_type != '1' ";
$select3 = mysql_query($sql3);
$status3 = array();
while($data3 = mysql_fetch_assoc($select3)) {
$status3[] = $data3;
}

if (mysql_num_rows($select3) == '1' )  { 

$data = array("status" => "3", "msg" => "Card Running" , "data" => $status , "card_type" => $type );
}





mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>