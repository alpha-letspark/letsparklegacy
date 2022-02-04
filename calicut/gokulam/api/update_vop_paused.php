<?php
/* include db.config.php */
// include_once('db_config.php');
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}
$curdate = date('Y-m-d H:i:s');
$todaydate = date('Y-m-d', strtotime('-3 days'));
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$id = $_POST["id"];

$query = "UPDATE details_transaction SET status='1' ,manual_vop_update = '1' ,  updated_at = '$curdate' where status = 0 and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$todaydate' and manual_vop_update != 2 ";
$update = mysqli_query($con,$query);

if($update){
$data = array("result" => 1, "message" => "Successfully VOP updated!");
} else {
$data = array("result" => 0, "message" => "Error!");
}
mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>