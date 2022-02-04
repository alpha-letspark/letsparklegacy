<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}
$curdate = date('Y-m-d H:i:s');
$todaydate = date('Y-m-d', strtotime('-1 days'));
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'root', 'letspark123321','gokulam') or die("DB Connection cant be established");

$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$vehicle_number = $obj->vehicle_number;

$query = "INSERT INTO anprdata(vehicle_number, created_at) VALUES ('$vehicle_number', '$curdate') ";
$insert = mysqli_query($con,$query);

if($insert){
$data = array("result" => 1, "message" => "Successfully Added Records!");
} else {
$data = array("result" => 0, "message" => "Error!");
}
mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>