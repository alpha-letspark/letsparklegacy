<?php

header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$con = mysqli_connect('localhost', 'root', 'letspark123321','mallofmysoredemo') or die("DB Connection cant be established");
$employee_id =  $_GET['employee_id'];
date_default_timezone_set('Asia/Kolkata');  
$area =  $_GET['area'];
$date = $_GET['date'];
//$date1= date('Y-m-d 03:00:00', strtotime('+1 days'));
$date1 = $_GET['date'];

if ($area == 0 ) {


$sql = "SELECT count(*) as two_wheeler_count from details_transaction where exit_user_id = $employee_id  and DATE_FORMAT(exit_time,'%Y-%m-%d') >= '$date' and DATE_FORMAT(exit_time,'%Y-%m-%d') <= '$date1'   and  vehicle_type = '2' and area = '$area'";
$result3 = mysqli_query($con,$sql);
$two_wheeler_count1=mysqli_fetch_row($result3);
$two_wheeler_count = implode(',', $two_wheeler_count1); 


$sql1 = "SELECT count(*) as four_wheeler_count from details_transaction where exit_user_id = $employee_id  and DATE_FORMAT(exit_time,'%Y-%m-%d') >= '$date' and DATE_FORMAT(exit_time,'%Y-%m-%d') <= '$date1'  and  vehicle_type = '4' and area = '$area'";
$result4 = mysqli_query($con,$sql1);
$four_wheeler_count1=mysqli_fetch_row($result4);
$four_wheeler_count = implode(',', $four_wheeler_count1); 



$query1 = "SELECT COALESCE(SUM(exit_pay),0) as sum_exit_pay_two from details_transaction where exit_user_id = $employee_id   and DATE_FORMAT(exit_time,'%Y-%m-%d') >= '$date' and DATE_FORMAT(exit_time,'%Y-%m-%d') <= '$date1'   and vehicle_type = '2'  and area = '$area'";
$result1 = mysqli_query($con,$query1);
$sum_exit_pay_two=mysqli_fetch_row($result1);
$total2 = implode(',', $sum_exit_pay_two); 


$query2 = "SELECT COALESCE(SUM(exit_pay),0) as sum_exit_pay_four from details_transaction where exit_user_id = $employee_id   and DATE_FORMAT(exit_time,'%Y-%m-%d') >= '$date'  and DATE_FORMAT(exit_time,'%Y-%m-%d') <= '$date1'  and vehicle_type = '4'  and area = '$area'";
$result2 = mysqli_query($con,$query2);
$sum_exit_pay_four=mysqli_fetch_row($result2);
$total4 = implode(',', $sum_exit_pay_four);


$sql6 = "SELECT count(*) as foc_count from details_transaction where exit_user_id = $employee_id  and DATE_FORMAT(exit_time,'%Y-%m-%d') >= '$date' and DATE_FORMAT(exit_time,'%Y-%m-%d') <= '$date1' and  foc = '1' and  area = '$area'";
$result6 = mysqli_query($con,$sql6);
$foc_count1=mysqli_fetch_row($result6);
$foc_count = implode(',', $foc_count1);



$total_final = $total2 + $total4 ;
$data1 = array("vehicle_type" => 2, "count" => $two_wheeler_count , "amount" =>$total2 );
$data2 = array("vehicle_type" => 4, "count" => $four_wheeler_count , "amount" =>$total4 );


$data = array("result" => 1, "all_vehicle" =>  array($data1,$data2), "area" => "basement" ,"foc_count" =>$foc_count, "total" => "$total_final"  );



}


 else

  {
$sql = "SELECT count(*) as two_wheeler_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '2' and area = '$area'";
$result3 = mysqli_query($con,$sql);
$two_wheeler_count1=mysqli_fetch_row($result3);
$two_wheeler_count = implode(',', $two_wheeler_count1); 

$sql1 = "SELECT count(*) as four_wheeler_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '4' and area = '$area'";
$result4 = mysqli_query($con,$sql1);
$four_wheeler_count1=mysqli_fetch_row($result4);
$four_wheeler_count = implode(',', $four_wheeler_count1); 


$sql = "SELECT count(*) as three_wheeler_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '3' and area = '$area'";
$result13 = mysqli_query($con,$sql);
$three_wheeler_count1=mysqli_fetch_row($result13);
$three_wheeler_count = implode(',', $three_wheeler_count1); 

$sql = "SELECT count(*) as mini_tt_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '5' and area = '$area'";
$result14 = mysqli_query($con,$sql);
$mini_tt_count1=mysqli_fetch_row($result14);
$mini_tt_count = implode(',', $mini_tt_count1); 


$sql = "SELECT count(*) as tt_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '6' and area = '$area'";
$result15 = mysqli_query($con,$sql);
$tt_count1=mysqli_fetch_row($result15);
$tt_count = implode(',', $tt_count1); 

$sql = "SELECT count(*) as bus_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '7' and area = '$area'";
$result15 = mysqli_query($con,$sql);
$bus_count1=mysqli_fetch_row($result15);
$bus_count = implode(',', $bus_count1); 

$sql = "SELECT count(*) as bus_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '10' and area = '$area'";
$result40 = mysqli_query($con,$sql);
$film_count1=mysqli_fetch_row($result40);
$film_count = implode(',', $film_count1);


$sql6 = "SELECT count(*) as foc_count from details_transaction where userid = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  foc = '1' and  area = '$area'";
$result6 = mysqli_query($con,$sql6);
$foc_count1=mysqli_fetch_row($result6);
$foc_count = implode(',', $foc_count1); 

$query1 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_two from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '2'  and area = '$area'";
$result1 = mysqli_query($con,$query1);
$sum_exit_pay_two=mysqli_fetch_row($result1);
$total1 = implode(',', $sum_exit_pay_two); 



$query2 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_four from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '4'  and area = '$area'";
$result2 = mysqli_query($con,$query2);
$sum_exit_pay_four=mysqli_fetch_row($result2);
$total2 = implode(',', $sum_exit_pay_four); 


$query3 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_three from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '3'  and area = '$area'";
$result3 = mysqli_query($con,$query3);
$sum_exit_pay_three=mysqli_fetch_row($result3);
$total3 = implode(',', $sum_exit_pay_three);


$query5 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_mini_tt from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '5'  and area = '$area'";
$result5 = mysqli_query($con,$query5);
$sum_exit_pay_mini_tt=mysqli_fetch_row($result5);
$total5 = implode(',', $sum_exit_pay_mini_tt); 

$query6 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_tt from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '6'  and area = '$area'";
$result6 = mysqli_query($con,$query6);
$sum_exit_pay_tt=mysqli_fetch_row($result6);
$total6 = implode(',', $sum_exit_pay_tt);

$query7 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_bus from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '7'  and area = '$area'";
$result7 = mysqli_query($con,$query7);
$sum_exit_pay_bus=mysqli_fetch_row($result7);
$total7 = implode(',', $sum_exit_pay_bus);

$query8 = "SELECT COALESCE(SUM(amount),0) as sum_exit_pay_bus from details_transaction where userid = $employee_id   and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date'  and vehicle_type = '10'  and area = '$area'";
$result8 = mysqli_query($con,$query8);
$sum_exit_pay_film=mysqli_fetch_row($result8);
$total8 = implode(',', $sum_exit_pay_film);


$total_final = $total1 + $total2 + $total3 + $total5 + $total6 + $total7 + $total8;

$data1 = array("vehicle_type" => "Two", "count" => $two_wheeler_count , "amount" =>$total1 );
$data2 = array("vehicle_type" => "Three", "count" => $three_wheeler_count , "amount" =>$total3 );
$data3 = array("vehicle_type" => "Four", "count" => $four_wheeler_count , "amount" =>$total2 );
$data4 = array("vehicle_type" => "Mini TT", "count" => $mini_tt_count , "amount" =>$total5 );
$data5 = array("vehicle_type" => "TT", "count" => $tt_count , "amount" =>$total6 );
$data6 = array("vehicle_type" => "Bus", "count" => $bus_count , "amount" =>$total7 );
$data7 = array("vehicle_type" => "Film Festival", "count" => $film_count , "amount" =>$total8 );


$data = array("result" => 1, "all_vehicle" =>  array($data1,$data2,$data3,$data4,$data5,$data6,$data7), "area" => "surface" ,"foc_count" =>$foc_count, "total" => "$total_final"  );

/*
$data = array("result" => 1, "two_wheeler_count" => $two_wheeler_count ,"four_wheeler_count" => $four_wheeler_count  , "three_wheeler_count" => $three_wheeler_count , "mini_tt_count" => $mini_tt_count , "tt_count" => $tt_count , "bus_count" => $bus_count, "foc_count" => $foc_count, "two_wheeler_amount" =>$sum_exit_pay_two, "four_wheeler_amount" =>$sum_exit_pay_four , "three_wheeler_amount" =>$sum_exit_pay_three , "mini_tt_amount" =>$sum_exit_pay_mini_tt , "tt_amount" =>$sum_exit_pay_tt , "bus_amount" =>$sum_exit_pay_bus, "area" => "surface" , "total" => "$total_final"   );
*/
}

mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>