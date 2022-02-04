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

$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
//$x =var_dump(json_decode($obj));
//$2000note= $obj->2000note;
$twothousand= $obj->twothousand;
$fivehundred= $obj->fivehundred;
$twohundred= $obj->twohundred;
$hundred= $obj->hundred;
$fifty= $obj->fifty;
$twenty= $obj->twenty;
$ten= $obj->ten;
$five= $obj->five;
$coins=$obj->coins;
$total = $obj->total;
$curdate = date('Y-m-d H:i:s');
$todaydate = date('Y-m-d', strtotime('-3 days'));
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('localhost', 'root', 'letspark123321','mallofmysoredemo') or die("DB Connection cant be established");

$query = "INSERT INTO money_collection_details (2000note,500note,200note,100note,50note,20note,10note,5note,coins, total)  values 
('$twothousand','$fivehundred','$twohundred','$hundred','$fifty','$twenty','$ten','$five', '$coins', '$total')";
$insert = mysqli_query($con,$query);

if($insert){
$data = array("result" => 1, "message" => "Successfully Added money details");
} else {
$data = array("result" => 0, "message" => "Error!");
}

mysqli_close($con);
/* JSON Response */

header('Content-type: application/json');
echo json_encode($data);

?>