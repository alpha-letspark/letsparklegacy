<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$client_id= $obj->client_id;
$min_purchase_amount= $obj->min_purchase_amount;
$four_wheeler_price= $obj->four_wheeler_price;
$two_wheeler_price= $obj->two_wheeler_price;
$max_free_time=$obj->max_free_time;
$address= $obj->address;
//$date = date("Y/m/d"); // Here we set by default status In-active.


if($_SERVER["REQUEST_METHOD"] == "POST"){

$query = "Update client_settings set client_id = $client_id ,min_purchase_amount= $min_purchase_amount, four_wheeler_price = $four_wheeler_price ,
two_wheeler_price= $two_wheeler_price,max_free_time= $max_free_time , address = $address";
$insert = mysql_query($query);

if($insert){
$data = array("success" => 1, "message" => "Successfully client settings updated!");
}} else {
$data = array("success" => 0, "message" => "Error!");
}

mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);

?>