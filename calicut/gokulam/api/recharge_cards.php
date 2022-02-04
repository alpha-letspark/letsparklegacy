<?php
/* include db.config.php */
// include_once('db_config.php');
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('localhost', 'root', 'letspark123321','mallofmysoredemo') or die("DB Connection cant be established");
//$id = $_POST["id"];
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$card_number= $obj->card_number;
$amount= $obj->amount;
$vehicle_type= $obj->vehicle_type;
$employee_id= $obj->employee_id;
$recharge_date = date('Y-m-d H:i:s');

$query = "INSERT INTO recharge_details (card_number,amount,vehicle_type,employee_id,recharge_date) VALUES ('$card_number','$amount','$vehicle_type','$employee_id','$recharge_date')";
$insert = mysqli_query($con,$query);

if($insert){
$data = array("result" => 1, "message" => "Successfully recharge added!");
} else {
$data = array("result" => 0, "message" => "Error!");
}
mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>