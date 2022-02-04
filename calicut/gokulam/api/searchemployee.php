<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);
// Get search keyword
$search = isset($_GET['search']) ? mysql_real_escape_string($_GET['search']) : "";  

if(empty($search)){
$data = array("status" => "error", "message" => "Not Found");
}

 else {
// get user data
$sql = "SELECT * from employee_allocation where name like '%$search%'; ";
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