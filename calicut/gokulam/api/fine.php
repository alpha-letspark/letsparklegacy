<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$userid= $obj->userid;
$card_number= $obj->card_number;
$vehicle_type= $obj->vehicle_type;
$client_id= $obj->client_id;
$vehicle_number= $obj->vehicle_number;
$redemption_id = $obj->redemption_id;
$remarks = $obj->remarks;
$fine_type= $obj->fine_type;
$amount1= $obj->amount;
$reason= $obj->reason;
$name= $obj->name;
$mobile= $obj->mobile;
$gst = '32AAECS2586E1ZI';

//$terms = "In case of loss of card, if the card is found by the management your fine amount shall be refunded. In that case, you will be required to bring this receipt. Note: Without this receipt the fine amount will not be refunded.Powered by LetsPark " ;
$terms = "" ;

//$exit_user_id = $obj->exit_user_id;

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$curdate=  date('Y-m-d');
$created_at = date('Y-m-d H:i:s');
$exit_time=  date('Y-m-d H:i:s');


if ($fine_type == 1  && $vehicle_type == 2 )  {

$type = "Loss of Card/Ticket" ;
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}

else if ($fine_type == 2 && $vehicle_type == 2 )  { 
$type = "Rash/ Negligence Driving" ;
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}
else if ($fine_type == 3 && $vehicle_type == 2 )  { 
$type = "Unauthorised parking" ;
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}
else if ($fine_type == 4 && $vehicle_type == 2 )   { 
$type = "Parking Obstruction" ;	
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}
else if ($fine_type == 5 && $vehicle_type == 2 )   { 
$type = "Damage to Equipment" ;	
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}

else if ($fine_type == 1 && $vehicle_type == 4 )   { 
$type = "Loss of Card/Ticket" ;	
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}

else if ($fine_type == 2 && $vehicle_type == 4 )  { 
$type = "Rash/ Negligence Driving" ;
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}
else if ($fine_type == 3 && $vehicle_type == 4 )  { 
$type = "Unauthorised parking" ;
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}
else if ($fine_type == 4 && $vehicle_type == 4 )   { 
$type = "Parking Obstruction" ;	
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}
else if ($fine_type == 5 && $vehicle_type == 4 )   { 
$type = "Damage to Equipment" ;	
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}

else if ( $vehicle_type == "" )   { 
$type = $obj->reason;
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}

else if ( $fine_type == "" )   { 
$type = $obj->reason;
$amount = $obj->amount;
$vehicle_number= $obj->vehicle_number;
}


//if condition stats checked by card number
if ($vehicle_number == "") {
 
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");

$sql = "select  transaction_id,vehicle_type,vehicle_number,entry_time,convert_tz(now(),@@session.time_zone,'+05:30') as exit_time,area,card_number from details_transaction where card_number = '$card_number' AND status= '0' ";

$select = mysql_query($sql);

$status_info="select {$select} {$transaction_id}  {$new_trans_id}";

$status = array();
while($data = mysql_fetch_assoc($select)) {

$entry_time = $data['entry_time'];
$initial_amount = $data['amount'];
$area = $data['area'];
$vehicle_number = $data['vehicle_number'];
//$exit_time = $data['exit_time'];

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$status[] = $data;
$vehicle_type = $data['vehicle_type'];
$paid_amount = $data['amount'];


}

$results = mysql_query("SELECT * FROM details_transaction where card_number = '$card_number' AND status= 0");
$results1 = mysql_query("SELECT * FROM details_transaction where card_number = '$card_number' AND status= 0 and fine = '1'");
$count = mysql_num_rows($results);
$count1 = mysql_num_rows($results1);

 if(mysql_num_rows($results) < '1')
{
//$data = array("status" => failed  );
$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number,reason,name,mobile) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number', '$reason', '$name' , '$mobile')";
$update = mysql_query($query);
if($update){
$data = array("success" => 1,  "data" => $status , "fine_amount" => $amount , "fine_type" => $type , "name" => $name ,  "mobile" => $mobile , "vehicle_type" => $vehicle_type ,"vehicle_number" => $vehicle_number ,"terms" => $terms,"gst" => $gst,"date" => $created_at, "message" => "Successfully fine details added!" );
}
else
{
	$data = array("status" => 'Already Fine Added'  );
}


}

 if(mysql_num_rows($results1) >= '1')
{
$data = array("status" => 'Already Fine Added'  );
}

else if(mysql_num_rows($results) == '1'){


$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number,reason,name,mobile) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number', '$reason', '$name' , '$mobile')";
$update = mysql_query($query);

$query1 = "UPDATE details_transaction SET fine = '1' where card_number = '$card_number'  and status = '0'";
$update1 = mysql_query($query1);

if($update){
$data = array("success" => 1,  "data" => $status , "fine_amount" => $amount , "fine_type" => $type , "name" => $name ,  "mobile" => $mobile , "vehicle_type" => $vehicle_type ,"vehicle_number" => $vehicle_number , "terms" => $terms,"gst" => $gst,"date" => $created_at, "message" => "Successfully fine details added!" );
}

} 
mysql_close($conn);
header("Content-type: application/json");
echo json_encode($data);




}
//if condition stats checked by card number ends here
//else condition stats checked by vehicle number
else if ($card_number == "") {


	$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");

$sql = "select  transaction_id,vehicle_type,vehicle_number,entry_time,convert_tz(now(),@@session.time_zone,'+05:30') as exit_time,area,card_number from details_transaction where vehicle_number = '$vehicle_number' AND status= '0' ";

$select = mysql_query($sql);

$status_info="select {$select} {$transaction_id}  {$new_trans_id}";

$status = array();
while($data = mysql_fetch_assoc($select)) {

$entry_time = $data['entry_time'];
$initial_amount = $data['amount'];
$area = $data['area'];
$vehicle_number = $data['vehicle_number'];
//$exit_time = $data['exit_time'];

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$status[] = $data;
$vehicle_type = $data['vehicle_type'];
$paid_amount = $data['amount'];


}


$results = mysql_query("SELECT * FROM details_transaction where vehicle_number = '$vehicle_number' AND status= 0");
$results1 = mysql_query("SELECT * FROM details_transaction where vehicle_number = '$vehicle_number' AND status= 0 and fine = '1'");
$count = mysql_num_rows($results);
$count1 = mysql_num_rows($results1);

 if(mysql_num_rows($results) < '1')
{

$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number,reason,name,mobile) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number', '$reason', '$name' , '$mobile')";
$update = mysql_query($query);
if($update){
$data = array("success" => 1,  "data" => $status , "fine_amount" => $amount , "fine_type" => $type , "name" => $name ,  "mobile" => $mobile , "vehicle_type" => $vehicle_type ,"vehicle_number" => $vehicle_number ,"terms" => $terms,"gst" => $gst,"date" => $created_at, "message" => "Successfully fine details added!" );

}
}

 if(mysql_num_rows($results1) >= '1')
{
$data = array("status" => 'Already Fine Added'  );
}

else if(mysql_num_rows($results) == '1'){


$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number')";
$update = mysql_query($query);

$query1 = "UPDATE details_transaction SET fine = '1' where vehicle_number = '$vehicle_number'  and status = '0'";
$update1 = mysql_query($query1);

if($update){
$data = array("success" => 1,  "data" => $status , "fine_amount" => $amount , "fine_type" => $type, "message" => "Successfully fine details added!" );
}

} 
mysql_close($conn);
header("Content-type: application/json");
echo json_encode($data);




}
//else condition stats checked by vehicle number ends here


else if ($card_number != "" || $vehicle_number != "" ) {


	$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");

$sql = "select  transaction_id,vehicle_type,vehicle_number,entry_time,convert_tz(now(),@@session.time_zone,'+05:30') as exit_time,area,card_number from details_transaction where vehicle_number = '$vehicle_number' AND status= '0' ";

$select = mysql_query($sql);

$status_info="select {$select} {$transaction_id}  {$new_trans_id}";

$status = array();
while($data = mysql_fetch_assoc($select)) {

$entry_time = $data['entry_time'];
$initial_amount = $data['amount'];
$area = $data['area'];
$vehicle_number = $data['vehicle_number'];
//$exit_time = $data['exit_time'];

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$status[] = $data;
$vehicle_type = $data['vehicle_type'];
$paid_amount = $data['amount'];


}


$results = mysql_query("SELECT * FROM details_transaction where vehicle_number = '$vehicle_number' AND status= 0");
$results1 = mysql_query("SELECT * FROM details_transaction where vehicle_number = '$vehicle_number' AND status= 0 and fine = '1'");
$count = mysql_num_rows($results);
$count1 = mysql_num_rows($results1);

 if(mysql_num_rows($results) < '1')
{

$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number,reason,name,mobile) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number', '$reason', '$name' , '$mobile')";
$update = mysql_query($query);
if($update){
$data = array("success" => 1,  "data" => $status , "fine_amount" => $amount , "fine_type" => $type , "name" => $name ,  "mobile" => $mobile , "vehicle_type" => $vehicle_type ,"vehicle_number" => $vehicle_number ,"terms" => $terms,"gst" => $gst,"date" => $created_at, "message" => "Successfully fine details added!" );

}
}

 if(mysql_num_rows($results1) >= '1')
{
$data = array("status" => 'Already Fine Added'  );
}

else if(mysql_num_rows($results) == '1'){


$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number')";
$update = mysql_query($query);

$query1 = "UPDATE details_transaction SET fine = '1' where vehicle_number = '$vehicle_number'  and status = '0'";
$update1 = mysql_query($query1);

if($update){
$data = array("success" => 1,  "data" => $status , "fine_amount" => $amount , "fine_type" => $type, "message" => "Successfully fine details added!" );
}

} 
mysql_close($conn);
header("Content-type: application/json");
echo json_encode($data);




}
//else condition stats checked by vehicle number ends here

else

{

$data = array("success" => 0, "message" => "Error!");

}


?>