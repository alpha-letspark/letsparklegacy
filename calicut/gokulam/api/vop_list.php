<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$date= $obj->date;
// Get user id
//$date = $_GET['date'];
// get user data
$sql = "SELECT details_transaction.vehicle_number,details_transaction.vehicle_type, details_transaction.entry_time,cms_users.name as entered_by from details_transaction inner join cms_users where details_transaction.userid = cms_users.id and details_transaction.status = 0 and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'";
$select = mysql_query($sql);
$status = array();
while($data = mysql_fetch_assoc($select)) {
$status[] = $data;
}

$q1 =  mysql_query("SELECT count(*) as statu,details_transaction.vehicle_number,details_transaction.vehicle_type, details_transaction.entry_time,cms_users.name as entered_by from details_transaction inner join cms_users where details_transaction.userid = cms_users.id and details_transaction.status = 0 and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'") or die(mysql_error());
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){

   $count = $row2['statu'];
  	}

$data = array("status" => "success", "data" => $status, "count" => $count );


mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>