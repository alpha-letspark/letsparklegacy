<?php
error_reporting(0);
@ini_set('display_errors', 0);
header('Access-Control-Allow-Origin: *');
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$remarks= $obj->remarks;
$user_id= $obj->user_id;
$actual_amount= $obj->actual_amount;
$amount_collected= $obj->amount_collected;
 date_default_timezone_set('Asia/Kolkata');
 $created_at=  date('Y-m-d H:i:s');

error_reporting(0);
@ini_set('display_errors', 0);
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
//$id = $_POST["id"];
//$two_wheeler_slot = $_POST["two_wheeler_slot"];
//$four_wheeler_slot = $_POST["four_wheeler_slot"];

$query = "INSERT INTO mcremarks (remarks,user_id,actual_amount,amount_collected,created_at) VALUES ('$remarks','$user_id','$actual_amount','$amount_collected' ,'$created_at')";
$insert = mysqli_query($con,$query);

if($insert){
$data = array("result" => 1, "message" => "Successfully added remarks!");
} else {
$data = array("result" => 0, "message" => "Error!");
}
mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>