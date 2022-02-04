<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$curdate=  date('Y-m-d');

// Get user id
$redemption_id = $_GET["redemption_id"];
 

$results = mysql_query("SELECT transaction_id, vehicle_type,entry_time, status,redemption_id FROM `details_transaction` where redemption_id= '$redemption_id' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '1'");
$count = mysql_num_rows($results);
if(mysql_num_rows($results) < '1')
{
$data = array("status" => failed  );
}

else {
// get user data
$sql = "SELECT transaction_id, vehicle_type,entry_time, status,redemption_id FROM `details_transaction` where redemption_id= '$redemption_id' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '1'";
$select = mysql_query($sql);
$status = array();
while($data = mysql_fetch_assoc($select)) {
$status[] = $data;
}

$data = array("status" => "success", "data" => $status);
}

mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>