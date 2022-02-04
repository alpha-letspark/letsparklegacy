<?php

header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$employee_id =  $_GET['employee_id'];
date_default_timezone_set('Asia/Kolkata');  
$area =  $_GET['area'];
$date11 = $_GET['date1'];
$time11 = $_GET['time1'];
$date22 = $_GET['date2'];
$time22 = $_GET['time2'];
$date1 = date('Y-m-d H:i:s', strtotime("$date11 $time11"));
$date2 = date('Y-m-d H:i:s', strtotime("$date22 $time22"));
//$date1= date('Y-m-d 03:00:00', strtotime('+1 days'));
//$date1 = $_GET['date'];


$sql = "SELECT count(*) as two_wheeler_count from details_transaction where  entry_time >= '$date1' and entry_time <= '$date2'  and  card_type = '5'";
$result3 = mysqli_query($con,$sql);
$two_wheeler_count1=mysqli_fetch_row($result3);
$two_wheeler_count = implode(',', $two_wheeler_count1); 

//two exit

$sql = "SELECT count(*) as two_wheeler_count from details_transaction where  exit_time >= '$date1' and exit_time <= '$date2'  and  card_type = '5'";
$result33 = mysqli_query($con,$sql);
$two_wheeler_count11=mysqli_fetch_row($result33);
$two_wheeler_count_exit = implode(',', $two_wheeler_count11); 


$sql1 = "SELECT count(*) as four_wheeler_count from details_transaction where  entry_time >= '$date1' and entry_time <= '$date2'  and   card_type = '4'";
$result4 = mysqli_query($con,$sql1);
$four_wheeler_count1=mysqli_fetch_row($result4);
$four_wheeler_count = implode(',', $four_wheeler_count1); 

//four exit

$sql1 = "SELECT count(*) as four_wheeler_count from details_transaction where  exit_time >= '$date1' and exit_time <= '$date2'  and   card_type = '4'";
$result44 = mysqli_query($con,$sql1);
$four_wheeler_count11=mysqli_fetch_row($result44);
$four_wheeler_count_exit = implode(',', $four_wheeler_count11); 


$query1 = "SELECT COALESCE(SUM(entry_pay),0) as sum_entry_pay_two from details_transaction where  exit_time >= '$date1' and exit_time <= '$date2'  and  card_type = '5'";
$result1 = mysqli_query($con,$query1);
$sum_entry_pay_two=mysqli_fetch_row($result1);
$total2 = implode(',', $sum_entry_pay_two); 

// two sum exit
$query111 = "SELECT COALESCE(SUM(exit_pay),0) as sum_exit_pay_two from details_transaction where  exit_time >= '$date1' and exit_time <= '$date2'  and  card_type = '5'";
$result111 = mysqli_query($con,$query111);
$sum_exit_pay_two=mysqli_fetch_row($result111);
$total2_exit = implode(',', $sum_exit_pay_two);



$query2 = "SELECT COALESCE(SUM(entry_pay),0) as sum_entry_pay_four from details_transaction where exit_time >= '$date1' and exit_time <= '$date2'  and  card_type = '4' ";
$result2 = mysqli_query($con,$query2);
$sum_entry_pay_four=mysqli_fetch_row($result2);
$total4 = implode(',', $sum_entry_pay_four);

// four sum exit
$query222 = "SELECT COALESCE(SUM(exit_pay),0) as sum_exit_pay_four from details_transaction where exit_time >= '$date1' and exit_time <= '$date2'  and  card_type = '4' ";
$result222 = mysqli_query($con,$query222);
$sum_exit_pay_four=mysqli_fetch_row($result222);
$total4_exit = implode(',', $sum_exit_pay_four);


$sql6 = "SELECT count(*) as foc_count from details_transaction where entry_time >= '$date1' and entry_time <= '$date2' and  foc = '1' ";
$result6 = mysqli_query($con,$sql6);
$foc_count1=mysqli_fetch_row($result6);
$foc_count = implode(',', $foc_count1);

$sql7 = "SELECT COUNT(*) as statu FROM  finedetails where created_at  >= '$date1' and created_at <= '$date2'";
$result7 = mysqli_query($con,$sql7);
$fine1=mysqli_fetch_row($result7);
$fine = implode(',', $fine1);


$sql8 = "SELECT COALESCE(SUM(fined_amount),0) as finedamount from finedetails where  created_at >= '$date1' and created_at <= '$date2'  ";
$result8 = mysqli_query($con,$sql8);
$fineamount1=mysqli_fetch_row($result8);
$fineamount = implode(',', $fineamount1);

$tot_two = $total2+ $total2_exit;
$tot_four = $total4+ $total4_exit;
$count_two = $two_wheeler_count + $two_wheeler_count_exit;
$count_four = $four_wheeler_count + $four_wheeler_count_exit;



$total_final = $tot_two + $tot_four;
$data1 = array("vehicle_type" => 2, "count" => $count_two , "amount" =>$total2+$total2_exit );
$data2 = array("vehicle_type" => 4, "count" => $count_four , "amount" =>$total4+$total4_exit );


$data = array("result" => 1, "all_vehicle" =>  array($data1,$data2), "type" => "overall" ,"foc_count" =>$foc_count, "fine" =>$fine, "fineamount" =>$fineamount, "total" => $total_final , "from" => "$date1" , "to" => "$date2" , "report_type" => "Overall"  );



mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>