<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$curdate=  date('Y-m-d');
$card_number = $_GET["card_number"];


$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$sql = "SELECT vehicle_type FROM `details_transaction` where card_number= '$card_number' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '0'";
$result3 = mysqli_query($con,$sql);
$org_vec=mysqli_fetch_row($result3);
$vecfinal = implode(',', $org_vec); 


$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$sql = "SELECT redemption_id FROM `details_transaction` where card_number= '$card_number' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '0'";
$result3 = mysqli_query($con,$sql);
$org_red=mysqli_fetch_row($result3);
$red_id = implode(',', $org_red); 




$results = mysql_query("SELECT transaction_id, vehicle_type,entry_time, status,redemption_id FROM `details_transaction` where card_number= '$card_number' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '0'");
$count = mysql_num_rows($results);

 if(mysql_num_rows($results) < 1 )

{
 $data = array("status" => false  );  
}

else 

{

$sql = "SELECT transaction_id, redemption_id,vehicle_type,entry_time, status,redemption_id FROM `details_transaction` where card_number= '$card_number' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '0'";
//$sq2 = "SELECT redemption_id FROM `details_transaction` where transaction_id= '$transaction_id' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '0'";


//$select2 = mysql_query($sq2);
//while( $rowc2 = mysql_fetch_array($select2)) {

  //$redemption_id =  $rowc2['redemption_id'];

//}

$sql1 = "SELECT card_number,sum(amount_redemmed) as amount_redemmed,redemption_flag, vehicle_type from redemption_shopowner where card_number = '$card_number' and DATE_FORMAT(created_at,'%Y-%m-%d') = '$curdate' ";
//$sqlnew = "SELECT redemption_flag from redemption_shopowner where redemption_id = '$redemption_id'";
$select = mysql_query($sql);
$select1 = mysql_query($sql1);
//$select5 = mysql_query($sqlnew);
//$status = array();
while($data = mysql_fetch_assoc($select) or  $rowc = mysql_fetch_array($select1)  ) {
  $redemption_id =  $data['card_number'];
  $amount =  $rowc['amount_redemmed'];
  $flag =  $rowc['redemption_flag'];
  $vehicle_type = $rowc['vehicle_type'];

}

  if($amount == "10" && $vehicle_type == "4"  ){
      //$id = 1; Temporary changed to restrict partial redemption.
      $id = 2;
    }
    else if($amount == "20" && $vehicle_type == "4"){
      $id = 2;
    }
    else if($amount == "10" && $vehicle_type == "2"){
      $id = 2;
    }
    else {
      $id = 0;
    }

$status[] = $data;

$data = array("status" => "success", "redemption_id" => $red_id, "vehicle_type" => $vecfinal, "current_redemption_status" => $id , "amount_redemmed" =>$amount , "card_number" =>$card_number);
}

mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>