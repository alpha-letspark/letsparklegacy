<?php
/* include db.config.php */
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$client_id= $obj->client_id;
$redemption_id= $obj->redemption_id;
$enquiry_date = date("Y/m/d"); // Here we set by default status In-active.
$client_id =$obj->client_id;
$shopowner_id =$obj->shopowner_id;
$amount_redemmed =$obj->amount_redemmed;
$redemption_flag =$obj->redemption_flag;


if($_SERVER["REQUEST_METHOD"] == "POST"){

foreach ($obj->products as $row ) {
		
$product_id= $row->product_id;
$length=  $row->length; 

$query = "INSERT INTO redemption_shopowner(client_id,redemption_id,	shopowner_id,amount_redemmed,redemption_flag) VALUES ('$client_id', '$redemption_id','$shopowner_id', '$amount_redemmed','$redemption_flag' )";
$insert = mysql_query($query);
}
if($insert){
$data = array("success" => 1, "message" => "Successfully redempted");
}} else {
$data = array("success" => 0, "message" => "Error!");
}

mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);

?>