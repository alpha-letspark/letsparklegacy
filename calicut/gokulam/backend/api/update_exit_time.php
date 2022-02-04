<?php
/* include db.config.php */
// include_once('db_config.php');
header('Access-Control-Allow-Origin: *');
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('localhost', 'letspark', 'letspark123321','letspark') or die("DB Connection cant be established"); 
$transaction_id = $_GET["transaction_id"];
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}
$exit_time =  date('Y-m-d H:i:s'); 

$query = "UPDATE details_transaction SET exit_time= $exit_time where transaction_id=$transaction_id";
$update = mysql_query($con,$query);

if($update){
$data = array("result" => 1, "message" => "Successfully exit time updated! exit_time:{$exit_time}");
} else {
$data = array("result" => 0, "message" => "Error!");
}
mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>