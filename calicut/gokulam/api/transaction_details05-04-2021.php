<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$userid= $obj->userid;

//$transaction_id= $obj->transaction_id;
$vehicle_type= $obj->vehicle_type;
$client_id= $obj->userid;
$vehicle_number= $obj->vehicle_number;
$redemption_id = $obj->redemption_id;
$area = $obj->area;
$card_number = $obj->card_number;
$curdate=  date('Y-m-d');
$curdate=  date('Y-m-d');
$flag= 1;
$count = 0;
 date_default_timezone_set('Asia/Kolkata');
 $entry=  date('Y-m-d H:i:s');
//$status = 0;
$redemption_id =  rand(1000,9999);

$entry_day=  date('dm');    
$entry_time =time();
//echo $entry_day.$entry_time;
$transaction = '';
$characters = array_merge( range('0','9'));
for ($i = 0; $i < 7; $i++) {
    $rand = mt_rand(0, count($characters)-1);
    $transaction .= $characters[$rand];

}
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$entry_time=  date('Y-m-d H:i:s');
$entry_time1 = date('Y-m-d H:i:s', time() + 2);
//$transaction_id =  $entry_time.$entry_day.$transaction; 
$transaction_id = round(microtime(true)* 1000);

//$last= substr(strip_tags($transaction_id), 10,8);

 $q4 =  mysql_query("SELECT `type`, `status` FROM card_details where card_number = '$card_number'") or die(mysql_error());
 $count = mysql_num_rows($q4);
//  echo $q1;
  while($row2 = mysql_fetch_array($q4)){

      $card_type =  $row2['type'];
      $statu = $row2['status'];

  }
if($statu == 1)
{


//$transaction_id = microtime(true) * 10000;




if ($card_type == 5 &&  $vehicle_type == "2" &&  $area == "0"   )  {
$amount = "0"  ;
$status = "0" ;
$veh = "Two" ;
}

else if ($card_type == 5 && $vehicle_type == "2" &&  $area == "1"   )  { 
$amount = "0";
$status = "0" ;
$veh = "Two" ;
}
else if ($card_type == 4 && $vehicle_type == "4" &&  $area == "0"   )  { 
$amount = "0"  ;
$status = "0" ;
$veh = "Four" ;
}

else if ($card_type == 6 && $vehicle_type == "4" &&  $area == "0"   )  { 
$amount = "0"  ;
$status = "0" ;
$veh = "Four" ;
}

else if ($card_type == 6 && $vehicle_type == "4" &&  $area == "1"   )  { 
$amount = "0"  ;
$status = "0" ;
$veh = "Four" ;
}
/* 4 conditiom */

/*  4 conidition nd */

else if ($card_type == 4 && $vehicle_type == "4" &&  $area == "1"   )  { 
$amount = "0";
$status = "0" ;
$veh = "Four" ;

}
else if ($card_type == 3   )  { 
$amount = "0";
$status = "0" ;
$area = "0" ;
$veh = "Four" ;
}

else if ($card_type == 1   )  { 
$amount = "0";
$status = "0" ;
$area = "0" ;
$veh = "Four" ;
}
else if ($card_type == 2   )  { 
$amount = "0";
$status = "0" ;
$area = "0" ;
$veh = "Four" ;
}

//down codeis for free card
else if (($card_type == 1 || $card_type == 2 || $card_type == 3 || $card_type == 4 || $card_type == 5 ) && $vehicle_type == NULL &&  $area == "0" )  { 
$amount = "0";
$status = "0" ;
$veh = "NA" ;
}
else if (($card_type == 1 || $card_type == 2 || $card_type == 3 ) && $vehicle_type == NULL &&  $area == "1" )  { 
$amount = "0";
$status = "0" ;
$veh = "NA" ;
}
else if ($card_type == 4 && $vehicle_type == NULL &&  $area == "1" )  { 
$amount = "0";
$status = "0" ;
$veh = "Four" ;
}
else if ($card_type == 5 && $vehicle_type == NULL &&  $area == "1" )  { 
$amount = "0";
$status = "0" ;
$veh = "Four" ;
}

else if ($card_type == 6 && $vehicle_type == NULL &&  $area == "1" )  { 
$amount = "0";
$status = "0" ;
$veh = "Four" ;
}

else if ( $area == NULL  && $card_type == 3)  { 
$amount = "0";
$status = "0" ;
$veh = "Four" ;
}
//upper code is for free card
/*else if ($vehicle_type == NULL &&  $area == "0" )  { 
$amount = "30";
$status = "0" ;
}
else if ($vehicle_type == NULL &&  $area == "1" )  { 
$amount = "40";
$status = "1" ;
}
else if ($card_type == 1 || $card_type == 2 || $card_type == 3  )  { 
$amount = "0";
$status = "1" ;
}*/




//$date = date("Y/m/d"); // Here we set by default status active.
$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
$statusnew = $status;


 $q1 =  mysql_query("SELECT `vehicle_number` , 'status' , 'card_number' FROM details_transaction where card_number = '$card_number'") or die(mysql_error());
 $count = mysql_num_rows($q1);
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){

      $rep_vec = $row2['vehicle_number'];
      $status = $row2['status'];
      $card =  $row2['card_number'];

  }
// card is valid oor not checking data
  $q2 =  mysql_query("SELECT * FROM  card_details where card_number = '$card_number'") or die(mysql_error());
 $count = mysql_num_rows($q2);
//  echo $q1;
  while($row3 = mysql_fetch_array($q2)){

      $valid_from = $row3['valid_from'];
      $valid_to = $row3['valid_to'];
      
  }
 if( $curdate >= $valid_from && $curdate <= $valid_to ){


//that ends here

 if( $card_number == $row2['card_number'] ){

$data = array("success" => 0, "message" => "Error!" , "vehicle_number" => $rep_vec , "status" => $status );
}


$results = mysql_query("SELECT * FROM card_details where card_number = $card_number and status = '1'");
$count = mysql_num_rows($results);
if(mysql_num_rows($results) < '1')

  {
$data = array("success" => 0, "message" => "Error! Invalid Card or Card not active");
}

$results = mysql_query("SELECT `vehicle_number` , 'status' , 'card_number' FROM details_transaction where card_number = '$card_number' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status = 0 ");
$count = mysql_num_rows($results);
 if(mysql_num_rows($results) >= '1')

  {

  if ($card_type == 1)

  {

   // $con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulamdemo') or die("DB Connection cant be established");
  //$query = "UPDATE details_transaction SET status='1',amount='$amount' , exit_time = '$entry' where card_number = '$card_number' AND status= 0 ";
//$update = mysqli_query($con,$query);

$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$query1 = "INSERT INTO details_transaction (client_id,userid,transaction_id,vehicle_type,card_number,card_type,entry_time,vehicle_number,area) VALUES ('$client_id','$client_id','$transaction_id','$vehicle_type','$card_number' ,'1' , '$entry' , '$vehicle_number', '$area')";
$insert = mysqli_query($con,$query1);
   
$data = array("success" => 1, "message" => " Entry Successful for Premium" ,"card type" => $card_type, "vehicle_number" => $rep_vec , "status" => '0' , "valid form" => $valid_from , "current date" => $curdate , "valid to" => $valid_to ,"vehicle_type" => $veh);
  }

  else
  {

$data = array("success" => 0, "message" => "Card is already running" ,"card type" => $card_type, "vehicle_number" => $rep_vec , "status" => '0' , "valid form" => $valid_from , "current date" => $curdate , "valid to" => $valid_to ,"vehicle_type" => $veh);
}
}



//else if(empty($vehicle_number)){
 //   $data = array("success" => 0, "message" => "Error Empty Vehicle number!");
//}


else {

date_default_timezone_set('Asia/Kolkata');  

$cur=  date('Y-m-d H:i:s');
$p=strtotime($cur);

$record = mysql_query( "SELECT * FROM details_transaction WHERE card_number = '$card_number' ");
    while($n = mysql_fetch_array($record))
    {
      $m1 = $n['entry_time']; 
    }
    $seconds = 0;
    $q = strtotime($m1);
    $seconds = $p - $q;
    //echo $diff;
   // if($seconds >= 1 || $q == 0 )
       if($record )
    {
      $query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";


      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew,"entry_time" => $entry,"vehicle_type" => $veh, "redemption_id" => $redemption_id);
    }
    else
    {
      $data = array("success" => 0, "message" => "Duplicate entry" ,"card type" => $card_type, "vehicle_number" => $rep_vec , "status" => '0' , "valid form" => $valid_from , "current date" => $curdate , "valid to" => $valid_to );
    }
}


}
else
{
  if ($count == 0)
  {
    $data = array("success" => 0, "message" => "Card is Invalid..!" );
  }
  else
  {
    $data = array("success" => 0, "message" => "Card date has been Expired..!",  );
  }
}
}
else
{

if ($card_number == "" && $vehicle_type == "2" &&  $area == "0"   )  { 
$amount = "0";
$statusnew = "1" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
$veh = "Two" ;


$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew,"entry_time" => $entry,"vehicle_type" => $veh,"redemption_id" => $redemption_id);

}
else if ($card_number == "" && $vehicle_type == "4" &&  $area == "0"   )  { 
$amount = "0";
$statusnew = "0" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
$veh = "Four" ;

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew,"entry_time" => $entry,"vehicle_type" => $veh, "redemption_id" => $redemption_id);

}

else if ($card_number == "" && $vehicle_type == "3" &&  $area == "0"   )  { 
$amount = "0";
$statusnew = "1" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
$veh = "Auto" ;

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew , "status" => $statusnew,"entry_time" => $entry,"vehicle_type" => $veh, "redemption_id" => $redemption_id);

}

else if ($card_number == "" && $vehicle_type == "5" &&  $area == "0"   )  { 
$amount = "0";
$statusnew = "1" ;
$veh = "Mini TT" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew,"entry_time" => $entry,"vehicle_type" => $veh,"redemption_id" => $redemption_id);

}

else if ($card_number == "" && $vehicle_type == "6" &&  $area == "0"   )  { 
$amount = "0";
$statusnew = "1" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
$veh = "TT" ;

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew , "entry_time" => $entry,"vehicle_type" => $veh,"redemption_id" => $redemption_id);

}

else if ($card_number == "" && $vehicle_type == "7" &&  $area == "0"   )  { 
$amount = "0";
$statusnew = "1" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
$veh = "Bus" ;

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew,"entry_time" => $entry,"vehicle_type" => $veh,"redemption_id" => $redemption_id);

}

else if ($card_number == "" && $vehicle_type == "10" &&  $area == "0"   )  { 
$amount = "0";
$statusnew = "1" ;
$veh = "Others" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew,"entry_time" => $entry,"vehicle_type" => $veh,"redemption_id" => $redemption_id );

}

else if ($card_number == "" && $vehicle_type == "2" &&  $area == "3"   )  { 
$amount = "0";
$statusnew = "0" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
$veh = "Two" ;

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew,"entry_time" => $entry,"vehicle_type" => $veh,"redemption_id" => $redemption_id);

}

else if ($card_number == "" && $vehicle_type == "4" &&  $area == "3"   )  { 
$amount = "0";
$statusnew = "0" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
$veh = "Four" ;

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew,"entry_time" => $entry,"vehicle_type" =>$veh,"redemption_id" => $redemption_id);

}

else if ($card_number == "" && $vehicle_type == "4" &&  $area == ""   )  { 
$amount = "0";
$statusnew = "0" ;
$veh = "Four" ;

$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status,area,card_number,card_type) 
SELECT * FROM (SELECT '$client_id' as userid,'$transaction_id' as transaction_id,'$vehicle_type' as vehicle_type,'$entry_time' as entry_time,'$amount' as amount,'$client_id' as client_id,'$vehicle_number' as vehicle_number,'$redemption_id' as redemption_id,'$flag' as flag,'$statusnew' as statusnew,'$area' as area , '$card_number' as card_number, '$card_type' as card_type) AS tmp
WHERE NOT EXISTS (
    SELECT entry_time FROM details_transaction WHERE entry_time >= '$entry_time' and entry_time <= '$entry_time1'  and card_number = '$card_number'  and status = '0'
);";
      $insert = mysql_query($query);

      $data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew, "entry_time" => $entry,"vehicle_type" => $veh,"redemption_id" => $redemption_id);

}


else
{
$data = array("success" => 0, "message" => "Card is last Invalid..!" );
}
}
mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);
?>