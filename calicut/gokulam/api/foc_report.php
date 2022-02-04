<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");

// Get user id
$date = $_GET['date'];
// get user data
$sql = "SELECT  details_transaction.vehicle_number, details_transaction.vehicle_type,details_transaction.exit_user_id ,details_transaction.exit_time,details_transaction.remarks,cms_users.name as exited_by from details_transaction inner join cms_users where details_transaction.exit_user_id = cms_users.id and DATE_FORMAT(exit_time,'%Y-%m-%d') = '$date' and foc = '1'";
$select = mysql_query($sql);

$status = array();
while($data = mysql_fetch_assoc($select)) {
$status[] = $data;
}

  $q1 =  mysql_query("SELECT  count(*) as statu from details_transaction inner join cms_users where details_transaction.exit_user_id = cms_users.id and DATE_FORMAT(exit_time,'%Y-%m-%d') = '$date' and foc = '1'") or die(mysql_error());
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