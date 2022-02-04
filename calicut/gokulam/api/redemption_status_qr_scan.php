<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$curdate=  date('Y-m-d');

// Get user id
//$redemption_id = $_GET["redemption_id"];
$transaction_id = $_GET["transaction_id"];
 

$results = mysql_query("SELECT transaction_id, vehicle_type,entry_time, status,redemption_id FROM `details_transaction` where transaction_id= '$transaction_id' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '0'");
$count = mysql_num_rows($results);
if(mysql_num_rows($results) < '1')
{
$data = array("status" => failed  );
}

else {
// get user data
$sql = "SELECT transaction_id, redemption_id,vehicle_type,entry_time, status,redemption_id FROM `details_transaction` where transaction_id= '$transaction_id' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '0'";
$sq2 = "SELECT redemption_id FROM `details_transaction` where transaction_id= '$transaction_id' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '0'";
$select2 = mysql_query($sq2);
while( $rowc2 = mysql_fetch_array($select2)) {

	$redemption_id =  $rowc2['redemption_id'];

}

$sql1 = "SELECT redemption_id,amount_redemmed from redemption_shopowner where redemption_id = '$redemption_id'";
$select = mysql_query($sql);
$select1 = mysql_query($sql1);
//$status = array();
while($data = mysql_fetch_assoc($select) or  $rowc = mysql_fetch_array($select1)) {
	$redemption_id =  $data['redemption_id'];
	$amount =  $rowc['amount_redemmed'];

 if($rowc['redemption_id'] == ""){
     $id = 0;
    } else
      $id = 1;

$status[] = $data;
}

$data = array("status" => "success", "data" => $status, "current_redemption_status" => $id , "amount" => $amount);
}

mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>