<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$curdate=  date('Y-m-d');
// Get user id
$employee_id = isset($_GET['employee_id']) ? mysql_real_escape_string($_GET['employee_id']) : "";

if(empty($employee_id)){
$data = array("status" => "error", "message" => "Not Found");
} else {
// get user data
$sql = "SELECT sum(exit_pay) as total_collected_entry from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'";
$sq2 = "SELECT sum(amount) as total_collected_exit from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'";
$select = mysql_query($sql);
$select2 = mysql_query($sq2);
$status = array();
while($data = mysql_fetch_assoc($select)) {
	while($data1 = mysql_fetch_assoc($select2)) {
$status[] = $data;
		//$total_collected_entry =  $data['total_collected_entry'];
		//$total_collected_exit =  $data1['total_collected_exit'];
		//$status= $total_collected_entry + $total_collected_exit;
}}

$data = array("status" => "success", "total_collected" => $status);
}

mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>